<?php
session_save_path($_SERVER['DOCUMENT_ROOT'].'/SESSION_SAVE');
ini_set("session.use_trans_sid", 0); //서버의 세션명령 초기화
ini_set("session.cache_expire", 1440); // 세션유지시간(분)
ini_set("session.gc_maxlifetime", 86400); //세션청소시간(초)
session_start();
if(!isset($_SESSION['UID'])) $_SESSION['UID'] = null;

$G = [];
$G['PCNT'] = 8;
$G['PDIV'] = 3;
$G['PAGE'] = 1;
if(isset($_REQUEST['page'])) $G['PAGE'] = $_REQUEST['page'];

//echo '<meta charset="utf-8" />';

$jumboH2 = array();
$jumboH4 = array();
$css = array();
$script = array();

$css['sql'] = '../css/main.css';
$script['sql'] = '../js/sql.js';
$jumboH2['sql'] = '성적관리 프로그램';
$jumboH4['sql'] = '학생들의 국, 영, 수 성적을 PHP로 관리합니다.';
$css['score'] = '../css/main.css';
$script['score'] = '../js/score.js';
$jumboH2['score'] = '성적관리 프로그램';
$jumboH4['score'] = '학생들의 국, 영, 수 성적을 Ajax/Json으로 관리합니다.';
$css['sample'] = '../css/sample.css';
$script['sample'] = '../js/sample.js';
$jumboH2['sample'] = 'Ajax Simple 버전';
$jumboH4['sample'] = 'Ajax 연습을 위한 Sample';
$css['main'] = '../css/main.css';
$script['main'] = '../js/main.js';
$jumboH2['main'] = 'Booldook의 <span class="w3-text-indigo">PHP/Javascript/Ajax</span> 포트폴리오';
$jumboH4['main'] = '';
$css['mem_in'] = '../css/main.css';
$script['mem_in'] = '../js/main.js';
$jumboH2['mem_in'] = 'PHP 를 활용한 회원 가입 및 로그인 - 회원가입';
$jumboH4['mem_in'] = '';
$css['g_list'] = '../css/gallery.css';
$script['g_list'] = '../js/gallery.js';
$jumboH2['g_list'] = 'PHP 를 활용한 갤러리 게시판';
$jumboH4['g_list'] = 'Masonry.js/php5.6/mysql5.1 사용';
$css['g_wr'] = '../css/gallery.css';
$script['g_wr'] = '../js/gallery.js';
$jumboH2['g_wr'] = 'PHP 를 활용한 갤러리 게시판';
$jumboH4['g_wr'] = 'Masonry.js/php5.6/mysql5.1 사용';
$css['g_view'] = '../css/gallery.css';
$script['g_view'] = '../js/gallery.js';
$jumboH2['g_view'] = 'PHP 를 활용한 갤러리 게시판';
$jumboH4['g_view'] = 'Masonry.js/php5.6/mysql5.1 사용';

$fileName = array();
$fileName[0] = basename($_SERVER['PHP_SELF']);
$fileName[1] = str_replace('.php', '', $fileName[0]);
$fileName[1] = str_replace('.html', '', $fileName[1]);
?>
