<?php
main_header(['dashboard']);
?>
<!-- ############ PAGE START-->
<style>
    .article-list {
        color: #313437;
        background-color: #fff;
    }

    .article-list p {
        color: #7d8285;
    }

    .article-list h2 {
        font-weight: bold;
        margin-bottom: 40px;
        padding-top: 40px;
        color: inherit;
    }

    @media (max-width:767px) {
        .article-list h2 {
            margin-bottom: 25px;
            padding-top: 25px;
            font-size: 24px;
        }
    }

    .article-list .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto;
    }

    .article-list .intro p {
        margin-bottom: 0;
    }

    .article-list .articles {
        padding-bottom: 40px;
    }

    .article-list .item {
        padding-top: 50px;
        min-height: 425px;
        text-align: center;
    }

    .article-list .item .name {
        font-weight: bold;
        font-size: 16px;
        margin-top: 20px;
        color: inherit;
    }

    .article-list .item .description {
        font-size: 14px;
        margin-top: 15px;
        margin-bottom: 0;
    }

    .article-list .item .action {
        font-size: 24px;
        width: 24px;
        margin: 22px auto 0;
        line-height: 1;
        display: block;
        color: #4f86c3;
        opacity: 0.85;
        transition: opacity 0.2s;
        text-decoration: none;
    }

    .article-list .item .action:hover {
        opacity: 1;
    }
</style>

<section class="article-list">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Post and View article</h2>
            <h3>
                <p class="text-center">Post and view the recent articles we've been pushed so far for our community.</p>
            </h3>
        </div>


        </br>

        <form method="POST" autocomplete="off" required>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Article Title</span>
                <input type="text" name="title" id="article-title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Article's Link</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                    <input type="text" name="articleURL" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" required>
                </div>
                <div class="form-text" id="basic-addon4">Paste the article's link above.</div>
            </div>
            <div class="input-group">
                <span class="input-group-text">Short Description</span>
                <textarea class="form-control" aria-label="With textarea" id="shortdesc" name="ShortDesc"></textarea required>
                </div> </br>
            </form>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center">
                    <button type="submit" class="btn btn-success form-control btn-add-article" name="submit"><b>POST IT!</b></button>
                </div>
                <div class="col-4"></div>
            </div>

            <div class="row articles">
                <?php if (!empty(@$articles)) {
                    foreach (@$articles as $value) {
                ?>
                <div class="col-sm-6 col-md-4 item"><a href="<?= @$value->Link ?>">
                    <img class="img-fluid" src="<?= base_url() ?>assets/images/banners/<?=rand(1,10)?>.jpg"></a>
                    <h3 class="name"><?= @$value->Title ?></h3>
                    <p class="description"><?= @$value->ShortDes ?></p>
                    
                    <a class="action" href=""><i class="bi bi-arrow-right-square-fill"></i></a>
                    <button type="button" class="btn btn-primary"> <a href="<?= @$value->url ?>" target="_blank" rel="noopener noreferrer" class="text-light" target="_blank" rel="noopener noreferrer"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16"> <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/></svg></a></button>
                    <button type="button" class="btn btn-secondary btn-update-modal" data-toggle="modal" data-target="#updateModal" data-id="<?= $value->ID ?>" data-title="<?= $value->Title ?>" data-articleurl="<?= $value->Link ?>" data-shortdesc="<?= $value->ShortDes ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/> <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg></button>
                    <button type="button" class="btn btn-danger btn-archive" data-id="<?= $value->ID ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16"> <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/></svg></button>
                </div>
                        <?php
                    }
                } else {
                    echo 'yes';
                } ?>
                
            </div>
            <div class="modal fade" id="updateModal" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="uID" hidden >
                        <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Article Title</span>
                <input type="text" name="title" id="u-article-title" class="form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Article's Link</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                    <input type="text" name="articleURL" class="form-control" id="u-basic-url"
                        aria-describedby="basic-addon3 basic-addon4" required>
                </div>
                <div class="form-text" id="basic-addon4">Paste the article's link above.</div>
            </div>
            <div class="input-group">
                <span class="input-group-text">Short Description</span>
                <textarea class="form-control" aria-label="With textarea" id="u-shortdesc" name="ShortDesc"></textarea required>
                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-update">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/dashboard/dashboard.js"></script>