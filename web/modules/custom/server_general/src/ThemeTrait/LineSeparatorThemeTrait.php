<?php

declare(strict_types=1);

namespace Drupal\server_general\ThemeTrait;

/**
 * Helper methods for a line separator.
 */
trait LineSeparatorThemeTrait {

  /**
   * Build a line separator.
   *
   * @param string $line_type
   *   Type of the line separator.
   *
   * @return array
   *   Render array.
   */
  protected function buildLineSeparator(string $line_type = 'horizontal'): array {
    return [
      '#theme' => 'server_theme_line_separator',
      '#line_type' => $line_type,
    ];
  }

}
