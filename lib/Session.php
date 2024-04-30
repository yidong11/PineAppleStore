<?php
// Path: lib/Session.php
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 // set function
 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 // get function
 public static function get($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

// check session function
 public static function checkSession(){
  self::init();
  if (self::get("adminlogin")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 // check login function
 public static function checkLogin(){
  self::init();
  if (self::get("adminlogin")== true) {
   header("Location:dashboard.php");
  }
 }

    // check login function
 public static function destroy(){
  session_destroy();
  header("Location:index.php");
 }

    // check login function
 public static function destroy_admin(){
    session_destroy();
    header("Location:login.php");
   }
}
?>