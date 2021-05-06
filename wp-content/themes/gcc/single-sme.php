<?php
/**
 * SME page template
 *
 * @package GCC
 */
$the_post_id = get_the_ID();
$post_tags = get_the_tags();
$sme_speaker_info = get_field('sme_speaker_info');
$sme_contact_info = get_field('sme_contact_info');
$sme_additional_info = get_field('sme_additional_info');
$sme_about = get_field('sme_about');
$previous_engagements_row_1 = get_field('previous_engagements_row_1');
$previous_engagements_row_2 = get_field('previous_engagements_row_2');
$previous_engagements_row_3 = get_field('previous_engagements_row_3');
$previous_engagements_row_4 = get_field('previous_engagements_row_4');
$previous_engagements_row_5 = get_field('previous_engagements_row_5');
$external_eminence_row_1 = get_field('external_eminence_row_1');
$external_eminence_row_2 = get_field('external_eminence_row_2');
$external_eminence_row_3 = get_field('external_eminence_row_3');
$external_eminence_row_4 = get_field('external_eminence_row_4');
$external_eminence_row_5 = get_field('external_eminence_row_5');
$first_name = explode(" ", $sme_speaker_info['full_name']);
$contact_name = explode(" ", $sme_contact_info['contact_name']);
$initials = get_avatar_initial($contact_name);

get_header();
// echo'<pre>';
// print_r($sme_additional_info['focus']);
// wp_die( );

?>
<div class="sme-page">
    <div class="bx--grid sme--grid">
        <div class="bx--row">
            <nav class="bx--breadcrumb" aria-label="breadcrumb">
                <div class="bx--breadcrumb-item">
                    <a href="#"
                       class="bx--link">Experts</a>
                </div>
            </nav>
        </div>
        <div class="bx--row">
            <div class="sme-page__name"><?php echo $sme_speaker_info['full_name'] ?>
            </div>
        </div>
        <div class="bx--row">
            <div style="display: flex;">
                <div class="sme-page__title">
                    <?php echo $sme_speaker_info['job_title'] ?>
                </div>
                <?php
                if (!empty($sme_speaker_info['job_position']) ) {
                    ?>
                <div class="sme-page__position">
                    <button class="bx--tag bx--tag--cyan">
                        <span class="bx--tag__label">Executive</span>
                    </button>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="bx--row">
            <div class="bx--col-lg-4">
                <div class="sme-page__image">
                    <img src="<?php echo $sme_speaker_info['image']['url']; ?>"
                         alt="<?php echo $sme_speaker_info['image']['named']; ?>">
                </div>
            </div>
            <div class="bx--col-lg-1"></div>
            <div class="bx--col-lg-7">
                <div class="bx--row">
                    <div class="bx--col-lg-9">
                        <div class="sme-page__author-info">
                            <div class="sme-page__author-info--avatar">
                            <?php
                            if(!empty($sme_contact_info['contact_image']['url'])){?>
                                <img src="<?php echo $sme_contact_info['contact_image']['url'] ?>"
                                     alt="<?php echo $sme_speaker_info['contact_image']['named']; ?>">
                            <?php } else { ?>
                                <div class="sme-page__author-info--avatar__init"><?php echo strtoupper($initials) ?></div>
                            <?php } ?>
                            </div>
                            <div>
                                <div class="sme-page__author-info--name">Contact
                                    <strong><?php echo $sme_contact_info['contact_name'] ?></strong> to request <strong><?php echo $first_name[0] ?></strong> as
                                    a speaker
                                </div>
                                <div style="display: flex; margin-top: 4px; cursor: pointer;">
                                    <coy class="sme-page__author-info--email"><?php echo $sme_contact_info['contact_email'] ?></coy>
                                    <svg id="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                        <defs>
                                            <style>.cls-1 {
                                                    fill: none;
                                                }</style>
                                        </defs>
                                        <title>copy</title>
                                        <path d="M28,10V28H10V10H28m0-2H10a2,2,0,0,0-2,2V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V10a2,2,0,0,0-2-2Z"
                                              transform="translate(0)"/>
                                        <path d="M4,18H2V4A2,2,0,0,1,4,2H18V4H4Z" transform="translate(0)"/>
                                        <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"
                                              class="cls-1" width="32" height="32"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bx--col-3">
                        <!-- <button class="bx--btn bx--btn--tertiary bx--btn--field" type="button">Request</button> -->
                    </div>
                </div>
                <div class="bx--row sme-page__row-1" style="border-top: 1px solid #E0E0E0;">
                    <div class="bx--col-lg-6">
                        <div class="sme-page__info-title">Focus</div>
                        <div class="sme-page__info-input"><?php echo implode(', ', $sme_additional_info['focus'] ); ?></div>

                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__info-title">Organization</div>
                        <div class="sme-page__info-input"><?php echo implode(', ', $sme_additional_info['organization'] ); ?></div>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__info-title">Audience target</div>
                        <div class="sme-page__info-input"><?php echo implode(', ', $sme_additional_info['target_audience'] ); ?></div>
                    </div>
                </div>
                <div class="bx--row sme-page__row-2">
                    <div class="bx--col-lg-6">
                        <div class="sme-page__info-title">Location</div>
                        <div class="sme-page__info-input"><?php echo $sme_additional_info['location'] ?></div>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__info-title">Travel availability</div>
                        <div class="sme-page__info-input"><?php echo implode(', ', $sme_additional_info['travel_availability'] ); ?></div>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__info-title">Languages</div>
                        <div class="sme-page__info-input"><?php echo implode(', ', $sme_additional_info['languages'] ); ?></div>
                    </div>
                </div>
                <div class="bx--row sme-page__row-3">
                    <div class="bx--col-lg-6">
                        <div class="sme-page__info-title">Tags</div>
                        <?php
                        if ($post_tags) {
                            foreach ($post_tags as $tag) {
                                ?>
                                <button class="bx--tag bx--tag--gray sme-page__tag">
                                    <span class="bx--tag__label"><?php echo $tag->name; ?></span>
                                </button>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="bx--row sme-page__row" style="border-top: 1px solid #E0E0E0;">
                    <div class="sme-page__sect-title">About</div>
                    <div class="sme-page__about--parg">
                        <?php echo htmlspecialchars_decode($sme_about) ?>
                    </div>
                    <div class="sme-page__post-date">Last updated
                        on <?php echo get_post_modified_time("F j, Y, g:i a") ?></div>
                </div>

                <!-- Previous engagements Table -->

                <div class="bx--row sme-page__table--row-header" style="border-top: 1px solid #E0E0E0;">
                    <div class="bx--col-lg-12 sme-page__sect-title">Previous engagements</div>
                    <div class="bx--col-lg-2">
                        <div class="sme-page__table--header">Date</div>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__table--header">Client</div>
                    </div>
                    <div class="bx--col-lg-4">
                        <div class="sme-page__table--header">Topic</div>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__table--header">Engagement leader</div>
                    </div>
                </div>
                <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                    <div class="bx--col-lg-2">
                        <?php if (!empty($previous_engagements_row_1['date'])) { ?>
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_1['date'] ?></div>
                        <?php } else { ?>
                            <div>N/A</div>
                        <?php } ?>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__table--data"><?php echo $previous_engagements_row_1['client'] ?></div>
                    </div>
                    <div class="bx--col-lg-4">
                        <div class="sme-page__table--data"><?php echo $previous_engagements_row_1['topic'] ?></div>
                    </div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__table--data"><?php echo $previous_engagements_row_1['leader'] ?></div>
                    </div>
                </div>

                <?php
                if (!empty($previous_engagements_row_2['date']) && is_array($previous_engagements_row_2)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-2">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_2['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_2['client'] ?></div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_2['topic'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_2['leader'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (!empty($previous_engagements_row_3['date']) && is_array($previous_engagements_row_3)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-2">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_3['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_3['client'] ?></div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_3['topic'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_3['leader'] ?></div>
                        </div>

                    </div>
                    <?php
                }
                ?>
                <?php
                if (!empty($previous_engagements_row_4['date']) && is_array($previous_engagements_row_4)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-2">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_4['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_4['client'] ?></div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_4['topic'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_4['leader'] ?></div>
                        </div>

                    </div>
                    <?php
                }
                ?>
                <?php
                if (!empty($previous_engagements_row_5['date']) && is_array($previous_engagements_row_5)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-2">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_5['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_5['client'] ?></div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_5['topic'] ?></div>
                        </div>
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $previous_engagements_row_5['leader'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- External eminence Table -->

                <div class="bx--row sme-page__table--row-header" style="border-top: 1px solid #E0E0E0;">
                    <div class="bx--col-lg-12 sme-page__sect-title">External eminence</div>
                    <div class="bx--col-lg-3">
                        <div class="sme-page__table--header">Date</div>
                    </div>
                    <div class="bx--col-lg-5">
                        <div class="sme-page__table--header">Subject</div>
                    </div>
                    <div class="bx--col-lg-4">
                        <div class="sme-page__table--header">Location</div>
                    </div>
                </div>
                <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                    <div class="bx--col-lg-3">
                        <?php if (!empty($external_eminence_row_1['date'])) { ?>
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_1['date'] ?></div>
                        <?php } else { ?>
                            <div>N/A</div>
                        <?php } ?>
                    </div>
                    <div class="bx--col-lg-5">
                        <div class="sme-page__table--data">
                            <?php if (!empty($external_eminence_row_1['subject']['title'])) { ?>
                                <a href="<?php echo esc_url($external_eminence_row_1['subject']['url']); ?>"><?php echo esc_html($external_eminence_row_1['subject']['title']); ?></a>
                            <?php } else { ?>
                                <div>N/A</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bx--col-lg-4">
                        <div class="sme-page__table--data"><?php echo $external_eminence_row_1['location'] ?></div>
                    </div>
                </div>

                <?php
                if (!empty($external_eminence_row_2['date']) && is_array($external_eminence_row_2)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_2['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-5">
                            <div class="sme-page__table--data">
                                <?php if (!empty($external_eminence_row_2['subject']['title'])) { ?>
                                    <a href="<?php echo esc_url($external_eminence_row_2['subject']['url']); ?>"><?php echo esc_html($external_eminence_row_2['subject']['title']); ?></a>
                                <?php } else { ?>
                                    <div>N/A</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_2['location'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (!empty($external_eminence_row_3['date']) && is_array($external_eminence_row_3)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_3['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-5">
                            <div class="sme-page__table--data">
                                <?php if (!empty($external_eminence_row_3['subject']['title'])) { ?>
                                    <a href="<?php echo esc_url($external_eminence_row_3['subject']['url']); ?>"><?php echo esc_html($external_eminence_row_3['subject']['title']); ?></a>
                                <?php } else { ?>
                                    <div>N/A</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_3['location'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (!empty($external_eminence_row_4['date']) && is_array($external_eminence_row_4)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_4['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-5">
                            <div class="sme-page__table--data">
                                <?php if (!empty($external_eminence_row_4['subject']['title'])) { ?>
                                    <a href="<?php echo esc_url($external_eminence_row_4['subject']['url']); ?>"><?php echo esc_html($external_eminence_row_4['subject']['title']); ?></a>
                                <?php } else { ?>
                                    <div>N/A</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_4['location'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (!empty($external_eminence_row_5['date']) && is_array($external_eminence_row_5)) {
                    ?>
                    <div class="bx--row sme-page__table--row" style="border-top: 1px solid #E0E0E0;">
                        <div class="bx--col-lg-3">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_5['date'] ?></div>
                        </div>
                        <div class="bx--col-lg-5">
                            <div class="sme-page__table--data">
                                <?php if (!empty($external_eminence_row_5['subject']['title'])) { ?>
                                    <a href="<?php echo esc_url($external_eminence_row_5['subject']['url']); ?>"><?php echo esc_html($external_eminence_row_5['subject']['title']); ?></a>
                                <?php } else { ?>
                                    <div>N/A</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bx--col-lg-4">
                            <div class="sme-page__table--data"><?php echo $external_eminence_row_5['location'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>     