<?php
// Задача рас
$str = preg_replace('/(a{3})(?!b)/', '!', 'aaaw aaab aaax aas');
echo $str.'<br>';

// Задача дэва
preg_match_all('/([a-z])\1+/', 'aaa bcd xxx efg', $matches);
echo implode(' ', $matches[0]).'<br>';

// Задача тэри
preg_match_all('/ab+a/', 'aa aba abba abbba abca abea', $matches);
echo implode(' ', $matches[0]).'<br>';

// Задача четыри
preg_match_all('/a\da/', 'a1a a2a a3a a4a a5a aba aca', $matches);
echo implode(' ', $matches[0]);