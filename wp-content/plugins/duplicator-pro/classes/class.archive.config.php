<?php

/**
 * @copyright 2016 Snap Creek LLC
 */
class DUP_PRO_Archive_Config
{
    //READ-ONLY: COMPARE VALUES
    public $created;
    public $version_dup;
    public $version_wp;
    public $version_db;
    public $version_php;
    public $version_os;
    public $dbInfo;
    //READ-ONLY: GENERAL
    public $url_old;
    public $opts_delete;
    public $blogname;
    public $wproot;
    public $relative_content_dir;
    //PRE-FILLED: GENERAL
    public $secure_on;
    public $secure_pass;
    public $skipscan;
    public $url_new;
    public $dbhost;
    public $dbname;
    public $dbuser;
    public $dbpass;
    public $ssl_admin;
    public $ssl_login;
    public $cache_wp;
    public $cache_path;
    //PRE-FILLED: CPANEL
    public $cpnl_dbname;
    public $cpnl_host;
    public $cpnl_user;
    public $cpnl_pass;
    public $cpnl_enable;
    public $cpnl_connect;
    public $cpnl_dbaction;
    public $cpnl_dbhost;
    public $cpnl_dbuser;
    //MULTI-SITE
    public $wp_tableprefix;
    public $mu_mode;
    public $mu_generation;
    public $subsites;
    //MISC
    public $license_limit;

    function __construct()
    {
        $this->subsites = array();
    }
}