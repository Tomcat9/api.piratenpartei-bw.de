<h2>Statistik</h2>
<p>Dies ist eine Zusammenfassung aller im Speicher befindlichen Seiten.</p>
<ul>
    <li><?php echo $page_count; ?> Wikiseiten</li>
    <li><?php echo $element_count; ?> Wikiseitenelemente</li>
</ul>
<h3>Detailaufschlüsselung</h3>
<?php 
if(!empty($wiki_pages)){
    echo '<ul>';
    foreach($wiki_pages as $wikiPage){
        echo '<li><a href="/wiki/getpagehtml/'.$wikiPage['WikiPage']['title'].'">'.$wikiPage['WikiPage']['title']."</a>";
        if(!empty($wikiPage['WikiElement'])){
            echo "<ul>";
            foreach($wikiPage['WikiElement'] as $wikiElement){
                echo '<li><a href="/wiki/gethtml/'.$wikiPage['WikiPage']['title'].'/'.$wikiElement['element_id'].'">'.$wikiElement['element_id'].'</a></li>';
            }
            echo "</ul>";
        }
        echo '</dt>';
    }
    echo '</ul>';
}
?>