<!-- resources/views/components/sidebar-categories.blade.php -->

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="sidebar bg-white shadow-sm rounded p-3">
    <div class="mcqs-details">
        <h6 class="fw-bold text-primary mb-2">
            <i class="fa-solid fa-list"></i> LATEST MENU
        </h6>
        <hr class="mt-1 mb-2">

        @php $initialLimit = 20; @endphp

        <ul class="list-group" id="category-list">
            @foreach ($categories as $index => $category)
                @if($index < $initialLimit)
                    <li class="list-group-item border-0 px-0">
                        <a class="category-select d-flex align-items-center justify-content-between text-dark py-2 px-2 rounded hover-bg"
                           data-id="{{ $category->id }}" href="#">
                            <span><i class="fa-solid fa-folder-open me-2 text-warning"></i>{{ $category->name }}</span>
                            <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <ul class="list-group subcategory-list ps-3" id="sub-{{ $category->id }}" style="display:none;"></ul>
                    </li>
                @else
                    <li class="list-group-item border-0 px-0 more-category-item" style="display: none;">
                        <a class="category-select d-flex align-items-center justify-content-between text-dark py-2 px-2 rounded hover-bg"
                           data-id="{{ $category->id }}" href="#">
                            <span><i class="fa-solid fa-folder-open me-2 text-warning"></i>{{ $category->name }}</span>
                            <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <ul class="list-group subcategory-list ps-3" id="sub-{{ $category->id }}" style="display:none;"></ul>
                    </li>
                @endif
            @endforeach

            @if($categories->count() > $initialLimit)
                <li class="list-group-item border-0 px-0 text-center" id="show-more-control" style="cursor: pointer;">
                    <a class="d-inline-flex align-items-center justify-content-center text-primary py-2 px-3" id="toggle-more">
                        <i class="fa-solid fa-spinner me-2" id="toggle-spinner" aria-hidden="true" style="display:none; width:1rem;"></i>
                        <i class="fa-solid fa-chevron-down me-2" id="toggle-arrow"></i>
                        <span id="toggle-label">Show more</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>

<style>
    .hover-bg:hover {
        background-color: #f1f7ff;
        transition: 0.2s ease-in-out;
    }
    .dropdown-arrow {
        transition: transform 0.3s ease;
    }
    .dropdown-arrow.rotated {
        transform: rotate(-180deg);
    }
    .list-group-item {
        background: transparent;
    }
    .more-category-item { display: none; }
    /* Ensure spinner space is reserved */
    #toggle-spinner { width: 1rem; }
</style>

<!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // Remove previous handlers to avoid duplicate binding when blade included multiple times
    $(document).off('click', '.category-select');
    $(document).off('click', '.subcategory-select');

    // Category click with auto-close for others
    $(document).on('click', '.category-select', function (e) {
        e.preventDefault();
        var categoryId = $(this).data('id');
        var subList = $('#sub-' + categoryId);
        var arrow = $(this).find('.dropdown-arrow');

        // Close all other dropdowns
        $('.subcategory-list').not(subList).slideUp(150);
        $('.dropdown-arrow').not(arrow).removeClass('rotated');

        if (subList.children().length > 0) {
            subList.slideToggle(150);
            arrow.toggleClass('rotated');
            return;
        }

        // Fetch subcategories
        $.ajax({
            url: '/get-subcategories/' + categoryId,
            method: 'GET',
            success: function (subcategories) {
                subList.empty();
                if (subcategories.length > 0) {
                    subcategories.forEach(function (subcat) {
                        subList.append(`
                            <li class="list-group-item border-0 px-0">
                                <a class="subcategory-select d-flex justify-content-between align-items-center py-2 px-2 rounded hover-bg" data-id="${subcat.id}" href="#">
                                    <span><i class="fa-solid fa-folder me-2 text-secondary"></i>${subcat.name}</span>
                                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                                </a>
                                <ul class="list-group topic-list ps-4" id="topic-${subcat.id}" style="display:none;"></ul>
                            </li>
                        `);
                    });
                } else {
                    subList.append('<li class="list-group-item border-0 ps-4 text-muted">No subcategories</li>');
                }
                subList.slideDown(150);
                arrow.addClass('rotated');
            },
            error: function () {
                subList.empty().append('<li class="list-group-item border-0 ps-4 text-danger">Failed to load</li>');
                subList.slideDown(150);
                arrow.addClass('rotated');
            }
        });
    });

    // Subcategory click with auto-close for others
    $(document).on('click', '.subcategory-select', function (e) {
        e.preventDefault();
        var subcatId = $(this).data('id');
        var topicList = $('#topic-' + subcatId);
        var arrow = $(this).find('.dropdown-arrow');

        $('.topic-list').not(topicList).slideUp(150);
        $('.subcategory-select .dropdown-arrow').not(arrow).removeClass('rotated');

        if (topicList.children().length > 0) {
            topicList.slideToggle(150);
            arrow.toggleClass('rotated');
            return;
        }

        // Fetch topics
        $.ajax({
            url: '/get-topics/' + subcatId,
            method: 'GET',
            success: function (topics) {
                topicList.empty();
                if (topics.length > 0) {
                    topics.forEach(function (topic) {
                        topicList.append(`
                            <li class="list-group-item border-0 px-0 ps-4">
                                <a href="/all-mcqs/${topic.id}" class="py-1 d-block">
                                    <i class="fa-solid fa-circle-question text-success me-2"></i>${topic.name}
                                </a>
                            </li>
                        `);
                    });
                } else {
                    topicList.append(`
                        <li class="list-group-item border-0 ps-4">
                            <a href="/all-mcqs/${subcatId}" class="text-primary">
                                <i class="fa-solid fa-chevron-down up-arrow me-2"></i> View MCQs
                            </a>
                        </li>
                    `);
                }
                topicList.slideDown(150);
                arrow.addClass('rotated');
            },
            error: function () {
                topicList.empty().append('<li class="list-group-item border-0 ps-4 text-danger">Failed to load</li>');
                topicList.slideDown(150);
                arrow.addClass('rotated');
            }
        });
    });

    // Show-more control logic
    var showingMore = false;
    var $moreItems = $('.more-category-item');

    $('#toggle-more').on('click', function (e) {
        e.preventDefault();

        var $spinner = $('#toggle-spinner');
        var $arrow = $('#toggle-arrow');
        var $label = $('#toggle-label');

        if (!showingMore) {
            // Start spinner, wait 1s, then reveal
            $spinner.show().addClass('fa-spin');
            $arrow.hide();
            $label.text('Loading...');
            setTimeout(function () {
                $moreItems.slideDown(180);
                $spinner.removeClass('fa-spin').hide();
                $arrow.show().addClass('rotated');
                $label.text('Show less');
                showingMore = true;
            }, 1000);
        } else {
            // hide immediately (no delay)
            $moreItems.slideUp(150, function () {
                $arrow.removeClass('rotated');
            });
            $spinner.hide().removeClass('fa-spin');
            $arrow.show();
            $label.text('Show more');
            showingMore = false;

            // close any open nested lists inside hidden items
            $moreItems.find('.subcategory-list, .topic-list').slideUp(0);
            $moreItems.find('.dropdown-arrow').removeClass('rotated');
        }
    });

    // Hide control if no hidden items exist
    if ($moreItems.length === 0) {
        $('#show-more-control').hide();
    }
});
</script>
