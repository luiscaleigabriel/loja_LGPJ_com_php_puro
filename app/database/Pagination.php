<?php

namespace app\database;

class Pagination 
{
  private int $currentPage;
  private int $totalPages;
  private int $linksPage = 5;
  private int $itensPerPages = 10;
  private int $totalItems;
  private string $pageIdentifier = 'page';

  public function setTotalItems(int $items) 
  {
    $this->totalItems = $items;
  }

  public function setPageIdentifier(string $identifier) 
  {
    $this->pageIdentifier = $identifier;
  }

  public function setItemsPerPages(int $value) 
  {
    $this->itensPerPages = $value;
  }

  private function calculations() 
  {
    $this->currentPage = $_GET['page'] ?? 1;

    $offset = ($this->currentPage - 1) * $this->itensPerPages;
    $this->totalPages = ceil($this->totalItems / $this->itensPerPages);
    return "limit {$this->itensPerPages} offset {$offset}";
  }

  public function dump() 
  {
    return $this->calculations();
  }

  public function links()
  {
    $links = '<ul class="pagination">';

    if($this->currentPage > 1) {
      $previous = $this->currentPage - 1;
      $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $previous]));
      $first = http_build_query(array_merge($_GET, [$this->pageIdentifier => 1]));
      $links .= "<li class='pagination__item'><a href=?{$first}>Primeira</a></li>";
      $links .= "<li class='pagination__item'><a href=?{$linkPage}> << </a></li>";
    }

    for($i = $this->currentPage - $this->linksPage; $i <= $this->currentPage + $this->linksPage; $i++) {
      if($i > 0 && $i <= $this->totalPages) {
        $class = $this->currentPage === $i ? 'activeLink' : '';
        $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $i]));
        $links .= "<li class='pagination__item {$class}'><a href=?{$linkPage}>{$i}</a></li>";
      }
    }

    if($this->currentPage <= $this->totalPages) {
      $next = $this->currentPage + 1;
      $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $next]));
      $last = http_build_query(array_merge($_GET, [$this->pageIdentifier => $this->totalPages]));
      $links .= "
            <li class='pagination__item'><a href=?{$linkPage}>>></a></li>";
      $links .= "
            <li class='pagination__item'><a href=?{$last}>Última</a></li>";
    }

    $links .= '</ul>';

    return $links;
  }
}