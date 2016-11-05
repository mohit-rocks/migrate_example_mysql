<?php
namespace Drupal\migrate_example_mysql\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for the movies.
 *
 * @MigrateSource(
 *   id = "pages"
 * )
 */
class Pages extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('pages', 'd')
      ->fields('d', ['id', 'title', 'body', 'city', 'state', 'site_url', 'site_name', 'created_date', 'keywords']);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Page ID'),
      'title' => $this->t('Page Title'),
      'body' => $this->t('Page Body'),
      'city' => $this->t('City'),
      'state' => $this->t('State'),
      'site_url' => $this->t('Site URL'),
      'site_name' => $this->t('Site Name'),
      'created_date' => $this->t('created_date'),
      'keywords' => $this->t('keywords'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'd',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    // Perform extra pre-processing for keywords terms, if needed.
    return parent::prepareRow($row);
  }
}
