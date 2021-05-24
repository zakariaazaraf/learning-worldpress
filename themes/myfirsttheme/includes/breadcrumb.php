<?php
    // Get The Categories And Generate Cateory Link
    $caterories = get_the_category(  );

    // Get The First Category Link | The Post Could Have Multiple Categories
    $categoryLink = get_category_link( $caterories[0]->cat_ID );
    
    // Get The Category Name, Also The First Category
    $categoryName = $caterories[0]->name;

    // Checks And Clean Urls, This Is For Security
    /* esc_url( $url:string, $protocols:array|null, $_context:string ) */
?>

<div class="container breadcrumb-container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white text-capitalize pl-0">
            <li class="breadcrumb-item text-capitalize"><a href="<?php echo get_home_url(  ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></li>
            <li class="breadcrumb-item">
                <a href="<?php echo esc_url( $categoryLink ); ?>">
                    <?php echo esc_html( $categoryName ); ?>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(  ); ?></li>
        </ol>
    </nav>
</div>

    