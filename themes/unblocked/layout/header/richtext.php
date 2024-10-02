<script type="application/ld+json">
    <?php
    $game_rate = \helper\game::get_rate($game->id);
    if ($game_rate['rate_average'] > 5) {
        $game_rate['rate_average'] = 5;
    }

    $breadcrumb[] = array('@type' => 'ListItem', 'position' => 1, 'name' => \helper\options::options_by_key_type('site_name'), 'item' => \helper\options::options_by_key_type('base_url'));

    $breadcrumb[] = array('@type' => 'ListItem', 'position' => 2, 'name' => $game->name, 'item' => \helper\options::options_by_key_type('base_url') . '/' . $game->slug);

    $SoftwareApplication = array();

    $SoftwareApplication['@context'] = 'https://schema.org';
    $SoftwareApplication['@type'] = 'SoftwareApplication';
    $SoftwareApplication['name'] = $game->name;
    if (load_url()->uri() != '/') {
        $SoftwareApplication['url'] = \helper\options::options_by_key_type('base_url');
    } else {
        $SoftwareApplication['url'] = \helper\options::options_by_key_type('base_url') . '/' . $game->slug;
    }
    $SoftwareApplication['author'] = array("@type" => 'Organization', 'name' => \helper\options::options_by_key_type('site_name'));
    if (load_url()->uri() != '/') {
        $SoftwareApplication['description'] = \helper\options::options_by_key_type('site_description');
    } else {
        $SoftwareApplication['description'] = $game->excerpt;
    }
    $SoftwareApplication['applicationCategory'] = 'GameApplication';
    $SoftwareApplication['operatingSystem'] = 'any';
    $SoftwareApplication['aggregateRating'] = array(
        '@type' => 'AggregateRating',
        'worstRating' => 1,
        'bestRating' => 5,
        'ratingValue' => $game_rate['rate_average'],
        'ratingCount' => $game_rate['rate_count'],
    );
    $SoftwareApplication['image'] = \helper\options::options_by_key_type('base_url') . $game->image;
    $SoftwareApplication['offers'] = array(
        '@type' => 'Offer',
        'category' => 'free',
        'price' => 0,
        'priceCurrency' => 'USD'
    );

    $breadcrumbList = array();
    $breadcrumbList['@context'] = 'https://schema.org';
    $breadcrumbList['@type'] = 'BreadcrumbList';
    $breadcrumbList['itemListElement'] = $breadcrumb;

    echo json_encode(array($SoftwareApplication, $breadcrumbList));
    ?>
</script>