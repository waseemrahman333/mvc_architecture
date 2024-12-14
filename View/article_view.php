 <ul>
    <?php foreach($allArticles as $article) : ?>
        <h1> <?php print $article["title"]; ?> </h1>
        <li> <?php print $article["description"]; ?> </li>
        <?php endforeach ; ?>
    </ul>