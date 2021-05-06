<?php
/**
 * Industries page template
 *
 * @package GCC
 */
get_header();
?>
<div class="bx--grid industries--grid">
    <div class="bx--row">
        <div class="bx--col-sm-2 industries-col">
            <div class="industries-col-left">
                <p class="industries-title">Industries</p>
                <p class="industries-pr">Whether you’re new to an industry or a seasoned expert, click on a tile
                    to learn more about what’s top of mind for our clients and to view the industry-specific
                    resources you can leverage with them.</p>
            </div>
        </div>
        <div class="bx--col-sm-2 industries-col">
            <!-- Automotive and Transportation -->
                    <a data-tile="clickable" class="bx--tile  industries-tile" tabindex="0"
                       href="<?php echo get_permalink(url_to_postid('industries/automotive-aerospace-defense')); ?>">
                        <div class="industries-tile--wrap">
                            <div id="icon" class="industries-tile--icon">
                                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;}</style></defs><title>car</title><path d="M29.34,15.94l-7.73-2.78L18.37,9.1A3,3,0,0,0,16.05,8h-8A3,3,0,0,0,5.58,9.32l-2.71,4A5,5,0,0,0,2,16.11V24a1,1,0,0,0,1,1H5.14a4,4,0,0,0,7.72,0h6.28a4,4,0,0,0,7.72,0H29a1,1,0,0,0,1-1V16.88A1,1,0,0,0,29.34,15.94ZM9,26a2,2,0,1,1,2-2A2,2,0,0,1,9,26Zm14,0a2,2,0,1,1,2-2A2,2,0,0,1,23,26Zm5-3H26.86a4,4,0,0,0-7.72,0H12.86a4,4,0,0,0-7.72,0H4V16.11a3,3,0,0,1,.52-1.69l2.71-4A1,1,0,0,1,8.06,10h8a1,1,0,0,1,.77.36l3.4,4.27a1.09,1.09,0,0,0,.44.32L28,17.58Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>
                            </div>
                            <div class="industries-tile--text">Automotive, Aerospace & Defense</div>
                        </div>
                    </a>



            <!-- Banking and Financial Markets -->
                    <a data-tile="clickable" class="bx--tile  industries-tile" tabindex="0"
                       href="<?php echo get_permalink(url_to_postid('industries/banking-financial-markets')); ?>">
                        <div class="industries-tile--wrap">
                            <div id="icon" class="industries-tile--icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;}</style></defs><title>finance</title><rect x="2" y="28" width="28" height="2"/><path d="M27,11a1,1,0,0,0,1-1V7a1,1,0,0,0-.66-.94l-11-4a1,1,0,0,0-.68,0l-11,4A1,1,0,0,0,4,7v3a1,1,0,0,0,1,1H6V24H4v2H28V24H26V11ZM6,7.7,16,4.06,26,7.7V9H6ZM18,24H14V11h4ZM8,11h4V24H8ZM24,24H20V11h4Z" transform="translate(0 0)"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>
                            </div>
                            <div class="industries-tile--text">Banking & Financial Markets</div>
                        </div>
                    </a>

                <!-- Government and Education -->
                    <a data-tile="clickable" class="bx--tile  industries-tile" tabindex="0"
                       href="<?php echo get_permalink(url_to_postid('industries/government-education')); ?>">
                        <div class="industries-tile--wrap">
                            <div id="icon" class="industries-tile--icon">   
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;}</style></defs><title>partnership</title><path d="M8,9a4,4,0,1,1,4-4A4,4,0,0,1,8,9ZM8,3a2,2,0,1,0,2,2A2,2,0,0,0,8,3Z" transform="translate(0)"/><path d="M24,9a4,4,0,1,1,4-4A4,4,0,0,1,24,9Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,24,3Z" transform="translate(0)"/><path d="M26,30H22a2,2,0,0,1-2-2V21h2v7h4V19h2V13a1,1,0,0,0-1-1H20.58L16,20l-4.58-8H5a1,1,0,0,0-1,1v6H6v9h4V21h2v7a2,2,0,0,1-2,2H6a2,2,0,0,1-2-2V21a2,2,0,0,1-2-2V13a3,3,0,0,1,3-3h7.58L16,16l3.42-6H27a3,3,0,0,1,3,3v6a2,2,0,0,1-2,2v7A2,2,0,0,1,26,30Z" transform="translate(0)"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>
                            </div>
                            <div class="industries-tile--text">Government & Education</div>
                        </div>
                    </a>

                <!-- Insurance -->
                    <a data-tile="clickable" class="bx--tile  industries-tile" tabindex="0"
                       href="<?php echo get_permalink(url_to_postid('industries/insurance')); ?>">
                        <div class="industries-tile--wrap">
                            <div id="icon" class="industries-tile--icon">
                                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="32px" height="32px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;}
                                </style>
                                <title>document</title>
                                <path d="M25.7,9.3l-7-7C18.5,2.1,18.3,2,18,2H8C6.9,2,6,2.9,6,4v24c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V10C26,9.7,25.9,9.5,25.7,9.3
                                    z M18,4.4l5.6,5.6H18V4.4z M24,28H8V4h8v6c0,1.1,0.9,2,2,2h6V28z"/>
                                <rect x="10" y="22" width="12" height="2"/>
                                <rect x="10" y="16" width="12" height="2"/>
                                <rect class="st0" width="32" height="32"/>
                                </svg>
                            </div>
                            <div class="industries-tile--text">Insurance</div>
                        </div>
                    </a>

                 <!-- Retail and Consumer Products -->
                    <a data-tile="clickable" class="bx--tile  industries-tile" tabindex="0"
                       href="<?php echo get_permalink(url_to_postid('industries/consumer')); ?>">
                        <div class="industries-tile--wrap">
                            <div id="icon" class="industries-tile--icon">                
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;}</style></defs><title>shop</title><path d="M30,10.68l-2-6A1,1,0,0,0,27,4H5a1,1,0,0,0-1,.68l-2,6A1.19,1.19,0,0,0,2,11v6a1,1,0,0,0,1,1H4V28H6V18h6V28H28V18h1a1,1,0,0,0,1-1V11A1.19,1.19,0,0,0,30,10.68ZM26,26H14V18H26Zm2-10H24V12H22v4H17V12H15v4H10V12H8v4H4V11.16L5.72,6H26.28L28,11.16Z" transform="translate(0)"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>
                            </div>
                            <div class="industries-tile--text">Consumer</div>
                        </div>
                    </a>

                <!-- Telecommunications -->
                    <a data-tile="clickable" class="bx--tile  industries-tile" tabindex="0"
                       href="<?php echo get_permalink(url_to_postid('industries/telco-media-entertainment')); ?>">
                        <div class="industries-tile--wrap">
                            <div id="icon" class="industries-tile--icon">      
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;}</style></defs><title>phone</title><path d="M26,29h-.17C6.18,27.87,3.39,11.29,3,6.23A3,3,0,0,1,5.76,3h5.51a2,2,0,0,1,1.86,1.26L14.65,8a2,2,0,0,1-.44,2.16l-2.13,2.15a9.37,9.37,0,0,0,7.58,7.6l2.17-2.15A2,2,0,0,1,24,17.35l3.77,1.51A2,2,0,0,1,29,20.72V26A3,3,0,0,1,26,29ZM6,5A1,1,0,0,0,5,6v.08C5.46,12,8.41,26,25.94,27A1,1,0,0,0,27,26.06V20.72l-3.77-1.51-2.87,2.85L19.88,22C11.18,20.91,10,12.21,10,12.12l-.06-.48,2.84-2.87L11.28,5Z" transform="translate(0)"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>
                            </div>
                            <div class="industries-tile--text">Telco, Media & Entertainment</div>
                        </div>
                    </a>
                
        </div>
    </div>
</div>