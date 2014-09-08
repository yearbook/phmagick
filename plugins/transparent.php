<?php
/*
    +--------------------------------------------------------------------------------------------+
    |   DISCLAIMER - LEGAL NOTICE -                                                              |
    +--------------------------------------------------------------------------------------------+
    |                                                                                            |
    |  This program is free for non comercial use, see the license terms available at            |
    |  http://www.francodacosta.com/licencing/ for more information                              |
    |                                                                                            |
    |  This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; |
    |  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. |
    |                                                                                            |
    |  USE IT AT YOUR OWN RISK                                                                   |
    |                                                                                            |
    |                                                                                            |
    +--------------------------------------------------------------------------------------------+

*/
/**
 * phMagick - background functions
 *
 * @package    phMagick
 * @version    0.1.0
 * @author     Dustin Thomson - dthomson@51systems.com
 * @copyright  Copyright (c) 2013
 * @license    http://www.francodacosta.com/phmagick/license/
 * @link       http://www.francodacosta.com/phmagick
 * @since      2013-09-18
 */
if (! class_exists('phMagick_transparent')) {
  class phMagick_transparent {

      /**
       * Makes the specified colour transparent in the image.
       * Ensure the output format is appropriate for transparency.
       *
       * @param phmagick $p
       * @param int $fuzz A percentage representing the tolerance of matching colours that aren't exactly the same
       * @param string $colour The colour to make transparent
       * @return \phmagick
       */
      function transparentPaintImage(phmagick $p, $fuzz = null, $colour = 'white')
      {
          $cmd  = $p->getBinary('convert');
          $cmd .= ' ' . $p->getSource() ;

          if ($fuzz != null)
              $cmd .= ' -fuzz ' . (int)$fuzz . '%';

          $cmd .= ' -transparent ' . $colour;

          $cmd .= ' ' . $p->getDestination() ;

          $p->execute($cmd);
          $p->setSource($p->getDestination());
          $p->setHistory($p->getDestination());

          return $p;
      }
  }
}