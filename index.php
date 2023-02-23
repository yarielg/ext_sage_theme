<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/bassberry/resources/fonts/webFonts/Bassberry_Helvetica_Neue.css">
    <link href="/wp-content/themes/bassberry/resources/fonts/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/wp-content/themes/bassberry/resources/fonts/fontawesome/css/solid.min.css" rel="stylesheet">
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
