<?php
class Login extends Laravel\Auth\Drivers\Driver {

    public function retrieve($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) !== false)
        {
            return $id;
        } 
    }

    public function attempt($a = array())
    {
        $datas = User::query()->where('username','=',$a['username'])->get(array('user_id','user_password'));
        if (!isSet($datas[0]))
            return FALSE;
        $d = $datas[0]->to_array();
        $userID = $d['user_id'];
        $passHash = $d['user_password'];
        if (!is_Null($a['username']) AND $this->phpbb_check_hash($a['password'], $passHash))
            return $this->login($userID, array_get($a, 'remember'));
        else
            return FALSE;
    }

    public function register($data)
    {
        User::create(array(
            'user_id' => '', // AUTOINCREMENT
            'user_type' => $data['user_type'],
            'group_id' => $data['user_type'],
            'user_permissions' => '',
            'user_perm_from' => 0, // 0
            'user_ip' => Request::id(),
            'user_regdate' => ,
            'username' => ,
            'username_clean' => ,
            'user_password' => ,
            'user_passchg' => ,
            'user_pass_convert' => 0, // 0
            'user_email' => ,
            'user_email_hash' => ,
            'user_birthday' => ,
            'user_lastvisit' => 0, // 0
            'user_lastmark' => ,
            'user_lastpost_time' => 0, // 0
            'user_lastpage' => '',
            'user_last_confirm_key' => '',
            'user_last_search' => 0, // 0
            'user_warnings' => 0, // 0
            'user_login_attempts' => 0, // 0
            'user_inactive_reason' => 0, // 0
            'user_inactive_time' => 0, // 0
            'user_posts' => 0, // 0
            'user_lang' => $data['lang'],
            'user_timezone' => $data['timezone'], // 0.00
            'user_dst' => $data['dst'], // 0
            'user_dateformat' => '', // d M Y H:i
            'user_style' => '', // 0
            'user_rank' => '', // 0
            'user_colour' => '',
            'user_new_privmsg' => '', // 0
            'user_unread_privmsg' => '', // 0
            'user_last_privmsg' => '', // 0
            'user_message_rules' => '', // 0
            'user_full_folder' => '', // -3
            'user_emailtime' => '', // 0
            'user_topic_show_days' => '', // 0
            'user_topic_sortby_type' => '', // t
            'user_topic_sortby_dir' => '', // d
            'user_post_show_days' => '', // 0
            'user_post_sortby_type' => '', // t
            'user_post_sortby_dir' => '', // a
            'user_notify' => '', // 0
            'user_notify_pm' => '', // 1
            'user_notify_type' => '', // 0
            'user_allow_pm' => '', // 1
            'user_allow_viewonline' => '', // 1
            'user_allow_viewemail' => '', // 1
            'user_allow_massemail' => '', // 1
            'user_options' => '', // 230271
            'user_avatar' => '',
            'user_avatar_type' => '', // 0
            'user_avatar_width' => '', // 0
            'user_avatar_height' => '', // 0
            'user_sig' => '',
            'user_sig_bbcode_uid' => '',
            'user_sig_bbcode_bitfield' => '',
            'user_from' => '',
            'user_icq' => '',
            'user_aim' => '',
            'user_yim' => '',
            'user_msnm' => '',
            'user_jabber' => '',
            'user_website' => '',
            'user_occ' => '',
            'user_interests' => '',
            'user_actkey' => '',
            'user_newpasswd' => '',
        ));
    }

/**
* Check for correct password
*
* @param string $password The password in plain text
* @param string $hash The stored password hash
*
* @return bool Returns true if the password is correct, false if not.
*/
public function phpbb_check_hash($password, $hash)
{
   $itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
   if (strlen($hash) == 34)
   {
      return ($this->_hash_crypt_private($password, $hash, $itoa64) === $hash) ? true : false;
   }

   return (md5($password) === $hash) ? true : false;
}

/**
* Generate salt for hash generation
*/
public function _hash_gensalt_private($input, &$itoa64, $iteration_count_log2 = 6)
{
   if ($iteration_count_log2 < 4 || $iteration_count_log2 > 31)
   {
      $iteration_count_log2 = 8;
   }

   $output = '$H$';
   $output .= $itoa64[min($iteration_count_log2 + ((PHP_VERSION >= 5) ? 5 : 3), 30)];
   $output .= $this->_hash_encode64($input, 6, $itoa64);

   return $output;
}

/**
* Encode hash
*/
public function _hash_encode64($input, $count, &$itoa64)
{
   $output = '';
   $i = 0;

   do
   {
      $value = ord($input[$i++]);
      $output .= $itoa64[$value & 0x3f];

      if ($i < $count)
      {
         $value |= ord($input[$i]) << 8;
      }

      $output .= $itoa64[($value >> 6) & 0x3f];

      if ($i++ >= $count)
      {
         break;
      }

      if ($i < $count)
      {
         $value |= ord($input[$i]) << 16;
      }

      $output .= $itoa64[($value >> 12) & 0x3f];

      if ($i++ >= $count)
      {
         break;
      }

      $output .= $itoa64[($value >> 18) & 0x3f];
   }
   while ($i < $count);

   return $output;
}

/**
* The crypt function/replacement
*/
public function _hash_crypt_private($password, $setting, &$itoa64)
{
   $output = '*';

   // Check for correct hash
   if (substr($setting, 0, 3) != '$H$')
   {
      return $output;
   }

   $count_log2 = strpos($itoa64, $setting[3]);

   if ($count_log2 < 7 || $count_log2 > 30)
   {
      return $output;
   }

   $count = 1 << $count_log2;
   $salt = substr($setting, 4, 8);

   if (strlen($salt) != 8)
   {
      return $output;
   }

   /**
   * We're kind of forced to use MD5 here since it's the only
   * cryptographic primitive available in all versions of PHP
   * currently in use.  To implement our own low-level crypto
   * in PHP would result in much worse performance and
   * consequently in lower iteration counts and hashes that are
   * quicker to crack (by non-PHP code).
   */
   if (PHP_VERSION >= 5)
   {
      $hash = md5($salt . $password, true);
      do
      {
         $hash = md5($hash . $password, true);
      }
      while (--$count);
   }
   else
   {
      $hash = pack('H*', md5($salt . $password));
      do
      {
         $hash = pack('H*', md5($hash . $password));
      }
      while (--$count);
   }

   $output = substr($setting, 0, 12);
   $output .= $this->_hash_encode64($hash, 16, $itoa64);

   return $output;
}
}
?>
