<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Модель, которая отвечает за установку начальных настроек при открытии того или иного контроллера
 * 
 * @author Mihairu <mis507@yandex.ru>
 * @version 1.0
 * @package models
 */

include APPPATH . 'third_party/sxgeo/SxGeo.php';

class Main_starter_model extends CI_Model {
                
                public function __construct() {
                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); //отключаем отображение замечаний и ошибок
				
				//функционал специально для полной версии
				//загружаем модели, которые будут использоваться на всех страницах сайта
                                $this->load->model("News_model", "news");
                                $this->load->model("Slider_model", "slider");
                                
                                $this->smarty->assign("slider", $this->slider->getSlides());
				
                                //устанавливаем папку шаблонов
                                $this->smarty->template_dir = APPPATH . "/modules/main/views/templates";
                                $this->smarty->compile_dir  = APPPATH . "/modules/main/views/templates_c";
                                
                                $this->smarty->assign("siteurl", base_protocol() . base_url());
                                $this->smarty->assign("baseurl", substr(base_url(), 0, -1));
                                $this->smarty->assign("baseprotocol", base_protocol());
                                $this->smarty->assign("time", date("H:i:s"));
                                $this->smarty->assign("date", date("Y.m.d"));
                                $this->smarty->assign("year", date("Y"));
                                $this->smarty->assign("mainfiles_folder", $this->config->item("mainfiles_folder"));
                                $this->smarty->assign("sitename", $this->config->item("sitename"));
                                $this->smarty->assign("online_num", self::getOnline());
				$this->smarty->assign("GET", $_GET);
				$this->smarty->assign("POST", $_POST);
				
				//добавляем логи о пользователе
				self::addLogs();
                }
                
                public function getOnline() {
                                $ResFile        = "";
                                $is_sid_in_file = "";
                                session_start();
                                //выделяем уникальный идентификатор сессии
                                $id = session_id();
                                
                                if ($id != "") {
                                                //текущее время
                                                $CurrentTime = time();
                                                //через какое время сессии удаляются
                                                $LastTime    = time() - 600;
                                                //файл, в котором храним идентификаторы и время
                                                $base        = "session.txt";
                                                
                                                $file = file($base);
                                                $k    = 0;
                                                for ($i = 0; $i < sizeof($file); $i++) {
                                                                $line = explode("|", $file[$i]);
                                                                if ($line[1] > $LastTime) {
                                                                                $ResFile[$k] = $file[$i];
                                                                                $k++;
                                                                }
                                                }
                                                
                                                for ($i = 0; $i < sizeof($ResFile); $i++) {
                                                                $line = explode("|", $ResFile[$i]);
                                                                if ($line[0] == $id) {
                                                                                $line[1]        = trim($CurrentTime) . "\n";
                                                                                $is_sid_in_file = 1;
                                                                }
                                                                $line        = implode("|", $line);
                                                                $ResFile[$i] = $line;
                                                }
                                                
                                                $fp = fopen($base, "w");
                                                for ($i = 0; $i < sizeof($ResFile); $i++) {
                                                                fputs($fp, $ResFile[$i]);
                                                }
                                                fclose($fp);
                                                if (!$is_sid_in_file) {
                                                                $fp   = fopen($base, "a-");
                                                                $line = $id . "|" . $CurrentTime . "\n";
                                                                fputs($fp, $line);
                                                                fclose($fp);
                                                }
                                }
                                return sizeof(file($base));
                }
                
                public function addLogs() {
                                $file    = "base.log"; //куда пишем логи
                                $col_zap = 4999; //строк в файле не более
                                
                                function getRealIpAddr() {
                                                if (!empty($_SERVER['HTTP_CLIENT_IP'])) // Определяем IP
                                                                {
                                                                $ip = $_SERVER['HTTP_CLIENT_IP'];
                                                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // Если IP идёт через прокси
                                                                {
                                                                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                                } else {
                                                                $ip = $_SERVER['REMOTE_ADDR'];
                                                }
                                                return $ip;
                                }
                                
                                if (strstr($_SERVER['HTTP_USER_AGENT'], 'YandexBot')) {
                                                $bot = 'YandexBot';
                                } elseif (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {
                                                $bot = 'Googlebot';
                                } else {
                                                $bot = $_SERVER['HTTP_USER_AGENT'];
                                }
                                
                                $ip    = getRealIpAddr();
                                $date  = date("H:i:s d.m.Y"); //дата события
                                $home  = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //какая страница сайта
                                $lines = file($file);
                                while (count($lines) > $col_zap)
                                                array_shift($lines);
                                $lines[] = $date . "|" . $bot . "|" . $ip . "|" . $home . "|\r\n";
                                file_put_contents($file, $lines);
                }
}