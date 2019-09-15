<?php

/**
 * @file
 * Theme for TARDIS views.
 *   Variables:
 *    - songsData: An array containing full songs list.
 *        each array item key pair are fields and values.
 *
 *
 */
function template_preprocess_views_view_audio_player(&$variables) {
  $options = $variables['view']->style_plugin->options;
  $titlefield = $options['titlefield'];
  $singerfield = $options['singerfield'];
  $lyricsfield = $options['lyricsfield'];
  $audiofield = $options['audiofield'];

  $field_names = array_keys($variables['view']->getDisplay()->getFieldLabels());
  $songsData = [];
  foreach ($variables['rows'] as $id => $row) {
    $fields = $row->_entity->getFields();
    $rowValues = [];
    foreach ($fields as $fld=>$field) {
      if (in_array($fld, $field_names)) {
        $fieldValue = $field->getValue($row);
        $type = $field->getFieldDefinition()->getType();
        $value =  NULL;
        if (isset($fieldValue[0]['value'])) {
          $value = $fieldValue[0]['value'];
        }
        if (isset($fieldValue[0]['target_id'])) {
          $target_id = $fieldValue[0]['target_id'];
          if ($type=='file') {
            $file = \Drupal\file\Entity\File::load($target_id);
            $value = file_create_url($file->getFileUri());
          } else {
            $value = $target_id;
          }
        }
        $rowValues[$fld] = $value;

      }
    }
    $song = [
      'nid' => $rowValues['nid'],
      'title' => $rowValues[$titlefield],
      'lyrics' => $rowValues[$lyricsfield],
      'singer'=> $rowValues[$singerfield],
      'audio'=> $rowValues[$audiofield],
    ];
    $songsData[] = $song;
  }
  $variables['first'] = $songsData[0];
  $variables['songs'] = $songsData;

  $variables['#attached']['library'][] = 'player/audioplayer';
}
