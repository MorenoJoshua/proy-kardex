<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?=site_url('landing/sist')?>">Calificaciones</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            $links = isset($links) ? $links : [];
            foreach ($links as $link) {
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= $link['url'] ?>"><?= $link['texto'] ?><span
                                class="sr-only">(current)</span></a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
        /*        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
*/
        ?>
    </div>
</nav>