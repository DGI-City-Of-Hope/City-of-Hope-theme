Drupal 6.x theme for City of Hope.
==================================

This theme is the theme for City of Hope. It a modification of fusion_starter, a
Fusion sub-theme based on the original City of Hope design at cityofhope.org.

Installation guidelines:
========================

- copy the folder to the theme folder. Often this is /sites/all/themes. If you 
download this theme from git, you might need to rename the folder of the theme
to 'cityofhope'.
- copy the fusion theme to the same theme folder as well.
- download and enable the skinr module
- enable the theme at admin/build/themes.

- Use primary menu as the main navigation.

- cssPie is added as functionality. It can only be called using a relative path
to the current page, not the css file where it is called from. So if the 
theme is not located at sites/all/themes/ , you might want to change that in
the css files.
Now it's set as: behavior: url('/sites/all/themes/cityofhope/pie/PIE.htc');

Under the cityofhope theme settings, make sure the following options 
are enabled:
- General settings > Layout : 16 column fixed grid
- General settings > Navigation : make sure primary menu is set as dropdown.

The following skinr options are added when configuring blocks:
- add a top border. Mostly used only for the highest positioned block in a region.

For panel regions:
- add a left or right border.

For panel panes:
- panes have the same cityofhope skinr settings as blocks. (top border)

A site slogan and footer message can be set in on the site information page.



- User login block: put this in the Top Header region and select "Horizontal"
 under Skinr's User login block styles.

- To add a block with user name, link to account and log out link:

Enable php snippets and add a new block with the following php snippet:

<?php global $user; ?>
<?php if ($user->uid): ?>
<span class="login_text"><?php print t('Welcome'); ?>, </span> <?php print ($user->name); ?> <br>
<?php print l(t("Your Account"),'user/'.$user->uid); ?> |
<?php print l("Log out","logout"); ?>
<?php endif; ?>

3 units wide should be fine.
Put the block in the same region as the user login block.

Navigation: Use the primary navigation as your primary menu. Move the "primary
menu block" into the "Preface Bottom" region. 