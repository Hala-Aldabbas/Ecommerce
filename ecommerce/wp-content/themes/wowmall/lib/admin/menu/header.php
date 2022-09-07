<style>
  body {
    background-color: #f7f7f7;
  }

  .nav-tab-active,
  .nav-tab-active:hover,
  .nav-tab-active:focus,
  .nav-tab-active:focus:active {
    border-bottom: 1px solid #f7f7f7;
    background: #f7f7f7;
  }

  .feature-section {
    margin: 30px 0;
  }

  .about-wrap img {
    width: auto;
  }

  .about-wrap div.updated,
  .about-wrap div.error,
  .about-wrap .notice {
    margin: 1em 200px 1em 0;
  }
</style>

<div class="wrap about-wrap full-width-layout">

<h1>Wowmall<span style="
    font-size: 10px;
    color: white;
    position: relative;
    top: -19px;
    background-color: #ff703e;
    padding: 3px 6px;
    border-radius: 3px;
    font-weight: 600;
    font-style: italic;
    letter-spacing: 0.5px;
">Beta</span></h1>

  <p class="about-text">
    <?php esc_html_e('This is the first release of an experimental full site editing theme for WooCommerce. ', 'wowmall'); ?>
    <?php esc_html_e('Please do not use this theme on a production site because templates, block patterns and block styles may change in future versions.', 'wowmall'); ?>
  </p>
  <p class="about-text">
    <?php printf('<a href="%s" target="_blank">%s</a>', WOWMALL_THEME_URL_DEMO, esc_html__('Demo', 'wowmall')); ?></a> |
    <?php printf('<a href="%s" target="_blank">%s</a>', WOWMALL_THEME_URL_DOCUMENTATION, esc_html__('Documentation', 'wowmall')); ?></a>
  </p>

  <?php printf(
    '<a href="%s" target="_blank">
        <div style="
            color: #fff;
            text-align: center;
            font-weight: 700;
            margin: 5px 0 0;
            display: inline-block;
            position: absolute;
            top: 0;
            right: 0;
            background-color: #333333;
            padding: 10px 25px 25px 25px;
            width: 140px;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-radius: 3px;
               ">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98.14 98.14">
                <path d="M74.16 71.68a33.33 33.33 0 10-8.39 6.88l10.15 3.11a.48.48 0 00.6-.57zm-25 4.57a26.58 26.58 0 01-26.63-26.58v-.1a26.49 26.49 0 013.61-13.38l6 4.82 3 8.29 3 8.89a.51.51 0 00.47.34h21.46c.34-.05 3.45-.59 4.4-4.62l3-10.39s2.32-5.85-4.44-6.12H49.72a.5.5 0 00-.48.65l1.66 5.05a.48.48 0 00.47.35h9.13a.5.5 0 01.48.63l-2.31 7.85a.48.48 0 01-.47.35H43.49a.87.87 0 01-.74-.51c-.23-.42-4.72-12.71-5.4-14.57a.16.16 0 000-.07l-7.36-6a26.58 26.58 0 0145.7 18.44v.1a26.58 26.58 0 01-26.58 26.58z" fill="#ff703e"></path>
                <circle fill="#ff703e" cx="57.31" cy="65.52" r="4.28"></circle>
                <circle fill="#ff703e" cx="42.48" cy="65.52" r="4.28"></circle>
              </svg>
               <span 
                style="
                right: -4px;
                opacity: 0.95;
                top: -2.5px;
                display: inline-block;
                position: relative;
               ">%s</span>
        </div>
      </a>',
    WOWMALL_THEME_URL_PROJECT,
    'WOWMALL'
  );
  ?>

</div>
<?php

if (isset($submenu['wowmall'])) {
  if (is_array($submenu['wowmall'])) {
?>
    <div class="wrap about-wrap full-width-layout">
      <h2 class="nav-tab-wrapper">
        <?php
        foreach ($submenu['wowmall'] as $tab) {
          $tab_url = $tab[2] == 'wowmall' ? 'themes.php?page=' . esc_attr($tab[2]) : 'admin.php?page=' . esc_attr($tab[2]);
        ?>
          <a href="<?php echo admin_url($tab_url); ?>" class="<?php echo esc_attr($tab[2]); ?> nav-tab<?php echo (isset($_GET['page']) && $_GET['page'] == $tab[2]) ? ' nav-tab-active' : ''; ?> "><?php echo wp_kses_post($tab[0]); ?></a>
        <?php
        }
        ?>
      </h2>
    </div>
<?php
  }
}
