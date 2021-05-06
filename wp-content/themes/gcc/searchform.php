<form id="searchform" method="GET" action="<?php echo esc_url(home_url('/search/')); ?>">
    <div data-search role="search" class="bx--search bx--search--lg">
        <label id="search-input-label-1" class="bx--label" for="search__input-1">Search</label>
        <input class="bx--search-input" type="text" id="search__input-1" placeholder="What are you looking for today?" name="s" value="<?php echo get_search_query(); ?>">
        <svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" class="bx--search-magnifier" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
            <path d="M15,14.3L10.7,10c1.9-2.3,1.6-5.8-0.7-7.7S4.2,0.7,2.3,3S0.7,8.8,3,10.7c2,1.7,5,1.7,7,0l4.3,4.3L15,14.3z M2,6.5	C2,4,4,2,6.5,2S11,4,11,6.5S9,11,6.5,11S2,9,2,6.5z"></path>
        </svg>
    </div>
    <br>
    <button class="bx--btn bx--btn--primary" type="submit">
        Search Content
    </button>
</form>