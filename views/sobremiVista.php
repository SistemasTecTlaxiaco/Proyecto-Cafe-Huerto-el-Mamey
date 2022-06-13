<?php
echo '<!doctype html>';
echo '<html lang="en">';
echo '<head>';
echo '<title>Realidad aumentada</title>';
echo '<meta charset="utf-8">';
echo '<meta name="description" content="&lt;model-viewer&gt; template">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '<link type="text/css" href="./public/js/styles.css" rel="stylesheet"/>';
echo '<!-- OPTIONAL: The :focus-visible polyfill removes the focus ring for some input types -->';
echo '<script src="https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js" defer></script>';
echo '</head>';
echo '<body>';
echo '<!-- <model-viewer> HTML element -->';
echo '<model-viewer bounds="tight" enable-pan src="public/img/BolsaAnimacion.glb" ar ar-modes="webxr scene-viewer quick-look" camera-controls environment-image="neutral" poster="poster.webp" shadow-intensity="1.45" exposure="0.84" shadow-softness="0.74" animation-name="EsqueletoAction" autoplay>';
echo '<div class="progress-bar hide" slot="progress-bar">';
echo '<div class="update-bar"></div>';
echo '</div>';
echo '<button slot="ar-button" id="ar-button">';
echo 'View in your space';
echo '</button>';
echo '<div id="ar-prompt">';
echo '<img src="public/img/ar_hand_prompt.png">';
echo '</div>';
echo '</model-viewer>';
echo '<script src="public/js/script.js"></script>';
echo '<!-- Loads <model-viewer> for browsers: -->';
echo '<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>';
echo '</body>';
echo '</html>';

print "<td><a href='".URL."tienda' class='btn btn-success' role='button'>Regresar</a></td>";
include_once("piepagina.php"); ?>