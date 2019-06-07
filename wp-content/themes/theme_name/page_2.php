<?php

echo wp_kses(
  get_the_content(),
  array(
      'span'      => array(
        'class' => true,
      ),
      'img'       => array(
         'src' => true,
         'class' => true,
      ),
      'p'         => array(
          'class' => true,
      ),
      'br'        => array(),
      'em'        => array(
        'class' => true,
      ),
      'strong'    => array(
        'class' => true,
      ),
      'a'         => array(
        'href' => true,
        'class' => true,
      ),
  )
);

?>
