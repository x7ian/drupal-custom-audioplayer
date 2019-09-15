<?php

namespace Drupal\player\Plugin\views\style;

use Drupal\core\form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;
use Drupal\views\Entity\View;

/**
 * Style plugin to render a list of years and months
 * in reverse chronological order linked to content.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "audio_player",
 *   title = @Translation("Audio Player"),
 *   help = @Translation("Custom Audio Player."),
 *   theme = "views_view_audio_player",
 *   display_types = { "normal" }
 * )
 */
class AudioPlayer extends StylePluginBase {

  /**
   * Does this Style plugin allow Row plugins?
   *
   * @var bool
   */
  protected $usesRowPlugin = FALSE;

  /**
   * Does the Style plugin support grouping of rows?
   *
   * @var bool
   */
  protected $usesGrouping = FALSE;

  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * This option only makes sense on style plugins without row plugins, like
   * for example table.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * {@inheritdoc}
   */
  protected $usesOptions = TRUE;

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['titlefield'] = ['default' => ''];
    $options['singerfield'] = ['default' => ''];
    $options['lyricsfield'] = ['default' => ''];
    $options['audiofield'] = ['default' => ''];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $field_options = ['' => $this->t('None')];
    foreach ($this->displayHandler->getHandlers('field') as $field => $handler) {
      $field_options[$field] = $handler->adminLabel();
    }
    $form['titlefield'] = [
      '#type' => 'select',
      '#title' => $this->t('Title Field'),
      '#description' => $this->t("Select a field to be used as the song title."),
      '#options' => $field_options,
      '#default_value' => $this->options['titlefield'],
    ];
    $form['singerfield'] = [
      '#type' => 'select',
      '#title' => $this->t('Singer Field'),
      '#description' => $this->t("Select a field to be used as the song singer."),
      '#options' => $field_options,
      '#default_value' => $this->options['singerfield'],
    ];
    $form['lyricsfield'] = [
      '#type' => 'select',
      '#title' => $this->t('Lyrics Field'),
      '#description' => $this->t("Select a field to be used as the song lyrics."),
      '#options' => $field_options,
      '#default_value' => $this->options['lyricsfield'],
    ];
    $form['audiofield'] = [
      '#type' => 'select',
      '#title' => $this->t('Audio Field'),
      '#description' => $this->t("Select a field to be used as the song audio."),
      '#options' => $field_options,
      '#default_value' => $this->options['audiofield'],
    ];

  }

}
