<h2><?php echo ($lang['frontendadmin']); ?></h2>
<div class="white">
  <form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
    <table cellspacing="0" cellpadding="0" border="0" width="99%" align="middle" class="content">
      <tr>
        <td align="center"><!-- Interface -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['pcinterface']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><select name="pc_interface">
                  <?php $options = array('CM11A', 'CM17A'); ?>
                  <?php foreach ($options as $key=>$opt): ?>
                  <?php if ($opt == $config['pc_interface']): ?>
                  <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                  <?php else: ?>
                  <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['pcinterface_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- HeyuBase -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['heyubaseloc']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><input type="text" name="heyu_base" value="<?php echo ($config['heyu_base']); ?>" /></td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['heyubaseloc_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- HeyuConf -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['heyuconfile']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><input type="text" name="heyuconf" value="<?php echo $config['heyuconf']; ?>" /></td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['heyuconfile_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Heyu Exec -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['heyuexec']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><input type="text" name="heyuexec" value="<?php echo ($config['heyuexec']); ?>" /></td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['heyuexec_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Security Level -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['seclevel']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><select name="seclevel">
                  <?php $options = array('0', '1', '2'); ?>
                  <?php foreach ($options as $key=>$opt): ?>
                  <?php if ($opt == $config['seclevel']): ?>
                  <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                  <?php else: ?>
                  <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['seclevel_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Password -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['password']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><input type="text" name="password" value="<?php echo ($config['password']); ?>" /></td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['password_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Language -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['language']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><!-- Language dropdown -->
                <?php $files = list_dir_content(LANG_FILE_LOCATION); $found = false; ?>
                <select name='lang'>
                  <?php foreach ($files as $file): ?>
                  <?php $name = substr($file, 0, -4);  // remove file extension ?>
                  <?php if ($name == $config['lang']): ?>
                  <option selected value="<?php echo $name; ?>"><?php echo $name;?></option>
                  <?php $found = true; ?>
                  <?php else: ?>
                  <option value="<?php echo $name;?>"><?php echo $name;?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                  <?php if (!$found): ?>
                  <option selected value="">auto</option>
                  <?php else: ?>
                  <option value="">auto</option>
                  <?php endif; ?>
                </select>
                <!-- End language dropdown -->
              </td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['language_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- URL Path -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['urlpath']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><input type="text" name="url_path" value="<?php echo ($config['url_path']); ?>" /></td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['urlpath_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Theme -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['theme']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><!-- Theme dropdown -->
                <?php $subdir = list_dir_content(FULL_THEME_FILE_LOCATION); ?>
                <select name="theme">
                  <?php foreach ($subdir as $dir): ?>
                  <?php if ($dir == $config['theme']): ?>
                  <option selected value="<?php echo $dir;?>"><?php echo $dir;?></option>
                  <?php else: ?>
                  <option value="<?php echo $dir;?>"><?php echo $dir;?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <!-- End theme dropdown -->
              </td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['theme_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Images -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['imgs']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><!-- Images dropdown -->
                <select name="imgs">
                  <?php $options = array('ON', 'OFF'); ?>
                  <?php foreach ($options as $key=>$opt): ?>
                  <?php if ($opt == $config['imgs']): ?>
                  <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                  <?php else: ?>
                  <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <!-- End images dropdown -->
              </td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['imgs_txt']); ?></h6></td>
            </tr>
          </table>
          <br />
          <!-- Refresh -->
          <table cellspacing="0" cellpadding="0" border="0" class="clear">
            <tr>
              <td><?php echo ($lang['refresh']); ?></td>
            </tr>
            <tr>
              <td valign="top" width="150px"><input type="text" size="10" name="refresh" value="<?php echo ($config['refresh']); ?>" /></td>
            </tr>
            <tr>
              <td width="95%"><h6><?php echo ($lang['refresh_txt']); ?></h6></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td style="border-right:none;" align="right"><input type="submit" value="<?php echo ($lang['save']); ?>" /></td>
      </tr>
    </table>
  </form>
</div>
