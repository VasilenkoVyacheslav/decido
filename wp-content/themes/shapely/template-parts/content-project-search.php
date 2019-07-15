<?php
//project
$project = get_field('project', 'options');
$project_id = $project[0];

if ($project_id) {
    $object = get_field('object', $project_id);
    $location = get_field('локация', $project_id);
    $desigion = get_field('решение', $project_id);
    $facebook = get_field('facebook', $project_id);
    $twitter = get_field('twitter', $project_id);
    $pint = get_field('pint', $project_id);

    ?>
    <article id="project-<?php echo $project_id; ?>" <?php post_class('project-post project-content post-content post-grid-wide'); ?>>
        <header class="entry-header nolist">
            <?php
                if (has_post_thumbnail()) {
                    $size = 'shapely-full';
                    $image = get_the_post_thumbnail($project_id, $size);
                    echo $image;
                }
            ?>
        </header>
        <div class="entry-project-content">
            <h2 class="post-title entry-title">
                <?php echo get_the_title($project_id); ?>
            </h2>
            <?php if ($object) { ?>
                <div class="proj-item">
                    <div class="proj-label">Объект</div>
                    <div class="proj-text"><?php echo $object; ?></div>
                </div>
            <?php } ?>
            <?php if ($location) { ?>
                <div class="proj-item">
                    <div class="proj-label">Локация</div>
                    <div class="proj-text"><?php echo $location; ?></div>
                </div>
            <?php } ?>
            <?php if ($desigion) { ?>
                <div class="proj-item">
                    <div class="proj-label">Решение</div>
                    <div class="proj-text"><?php echo $desigion; ?></div>
                </div>
            <?php } ?>
            <div class="project-content-text <?php echo $dropcaps ? 'dropcaps-content' : ''; ?>">
                <?php
                echo get_post_field('post_content', $project_id);
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'shapely'),
                        'after' => '</div>',
                    )
                );
                ?>
            </div>
            <div class="social-wrapp">
                <ul>
                    <?php if ($facebook) { ?>
                        <li><a href="<?php print $facebook; ?>"><i class="fa fa-facebook-f"></i></a></li>
                    <?php } ?>
                    <?php if ($twitter) { ?>
                        <li><a href="<?php print $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if ($pint) { ?>
                        <li><a href="<?php print $pint; ?>"><i class="fa fa-pinterest-p"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </article>
<?php } ?>