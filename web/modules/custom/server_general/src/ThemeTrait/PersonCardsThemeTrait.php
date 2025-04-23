<?php

declare(strict_types=1);

namespace Drupal\server_general\ThemeTrait;

/**
 * Helper methods for rendering Person Card(s) elements.
 */
trait PersonCardsThemeTrait {

  use ButtonThemeTrait;
  use CardThemeTrait;
  use ElementWrapThemeTrait;
  use InnerElementLayoutThemeTrait;
  use LineSeparatorThemeTrait;

  /**
   * Build Person cards element.
   *
   * @param array $items
   *   The render array.
   *
   * @return array
   *   The render array.
   */
  protected function buildElementPersonCards(array $items): array {
    return $this->buildCards($items);
  }

  /**
   * Build a Person card.
   *
   * @param string $image_url
   *   The image Url.
   * @param string $alt
   *   The image alt.
   * @param string $name
   *   The name.
   * @param string $job_title
   *   The job title.
   * @param string $role
   *   The role.
   *
   * @return array
   *   The render array.
   */
  protected function buildElementPersonCard(string $image_url, string $alt, string $name, string $job_title, string $role): array {
    $elements = [];
    $image_text_elements = [];
    $text_elements = [];
    $action_elements = [];

    // Image.
    $element = [
      '#theme' => 'image',
      '#uri' => $image_url,
      '#alt' => $alt,
      '#width' => 128,
    ];

    $image_text_elements[] = $this->wrapRoundedCornersFull($element);

    // Name.
    $element = $this->wrapTextFontWeight($name, 'medium');
    $element = $this->wrapTextCenter($element);
    $text_elements[] = $this->wrapTextColor($element, 'darkest-gray');

    // Job Title.
    $element = $this->wrapTextResponsiveFontSize($job_title, 'sm');
    $element = $this->wrapTextCenter($element);
    $text_elements[] = $this->wrapTextColor($element, 'gray');

    // Role.
    $element = $this->wrapTextResponsiveFontSize($role, 'xs');
    $element = $this->wrapTextCenter($element);
    $element = $this->wrapTextColor($element, 'green');
    $element = $this->wrapContainerTopBottomPadding($element, '2', '1');
    $element = $this->wrapContainerBackgroundColor($element, 'light-green');
    $text_elements[] = $this->wrapRoundedCornersLarge($element);

    // Image and Text Elements.
    $image_text_elements[] = $this->wrapContainerVerticalSpacingTiny($text_elements, 'center');
    $image_text_elements = $this->wrapContainerVerticalSpacingBig($image_text_elements, 'center');
    $elements[] = $this->buildInnerElementCustomLayout($image_text_elements);

    // Divider.
    $elements[] = $this->buildLineSeparator();

    // Action elements.
    $action_elements[] = $this->buildActionButton($this->t('Email'), '', 'email');
    $action_elements[] = $this->buildLineSeparator('vertical');
    $action_elements[] = $this->buildActionButton($this->t('Call'), '', 'call');
    $elements[] = $this->wrapContainerHorizontal($action_elements);

    return $this->wrapContainerBorder($elements);
  }

}
