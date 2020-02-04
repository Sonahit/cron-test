<?php $sort = isset($_GET['sort']) ? $_GET['sort'] : 'price';?>
<?php $direction = isset($_GET['direction']) ? $_GET['direction'] : 'desc';?>

<nav class="menu">
    <span class="menu__label">
        Сортировка:
    </span>
    <ul class="menu__list">
        <li>
            <a

                href="#"
                data-sort='price'
                data-direction='asc'
                <?php if ($direction === 'asc' and $sort === 'price') {?>
                    class="link menu__link is-active"
                <?php } else { ?>
                    class="link menu__link"
                <?php } ?>
            >
                По цене ▲
            </a>
        </li>
        <li>
            <a
                href="#"
                data-sort='price'
                data-direction='desc'
                <?php if ($direction === 'desc' and $sort === 'price') {?>
                    class="link menu__link is-active"
                <?php } else { ?>
                    class="link menu__link"
                <?php } ?>
            >
                По цене ▼
            </a>
        </li>
        <li>
            <a
                href="#"
                data-sort='author'
                data-direction='asc'
                <?php if ($direction === 'asc' and $sort === 'author') {?>
                    class="link menu__link is-active"
                <?php } else { ?>
                    class="link menu__link"
                <?php } ?>
            >
                По автору ▲
            </a>
        </li>
        <li>
            <a
                href="#"
                data-sort='author'
                data-direction='desc'
                <?php if ($direction === 'desc' and $sort === 'author') {?>
                    class="link menu__link is-active"
                <?php } else { ?>
                    class="link menu__link"
                <?php } ?>
            >
                По автору ▼
            </a>
        </li>
    </ul>
</nav>

<script>
    document.querySelector('.menu').addEventListener('click', e =>{
        e.preventDefault();
        const {target} = e;
        if(target.classList.contains('link')){
            const nav = e.currentTarget;
            const links = nav.querySelectorAll('.menu__link');
            Array.from(links).forEach(link => {
                if(link.classList.contains('is-active')){
                    link.classList.remove('is-active');
                }
            });
            target.classList.add('is-active');
            const sort = target.getAttribute('data-sort');
            const direction = target.getAttribute('data-direction');
            window.location.replace(`${location.origin}?sort=${sort}&direction=${direction}`);
        }
    })
</script>
