<?php
$files = new Files();
?>
<div class="col-sm row images">
    <div class="col-sm">

        <div class="titleImg">
            ..<?php echo $x2 . $x['value']; ?>
        </div>
        <div class="buttonImg">
            <button class="text-right deleteF" name="idfiles" value="..<?php echo $x2 . $x['value']; ?>">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                </svg>
            </button>
        </div>
        <?php if (is_dir($_SERVER['DOCUMENT_ROOT'] . $x2 . $x['value'])) : ?>
            <div class="boxImage imgDirBoxGallery">
                <img width="100%" src="/img/icon/dir.jpg" alt="<?php echo $x2 . $x['value']; ?>">
            </div>

            <div class="closeDirBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
            <div class="dirBoxGallery displayNone row">
                <?php foreach ($files->getImg($_SERVER['DOCUMENT_ROOT'] . $x2 . $x['value']) as $key => $value) : ?>
                    <div class="buttonImg">
                        <button class="text-right deleteF" name="idfiles" value="..<?php echo $x2 . $x['value'] . '/' . $value; ?>">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                            </svg>
                        </button>
                    </div>
                    <div class="col-sm">
                        <img width="100%" class="imgDir iconBaseDir" src="<?php echo $x2 . $x['value'] . '/' . $value; ?>" alt="<?php echo $x2 . $value; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="boxImage">
                <img width="100%" class="iconBaseDir" src="<?php echo $x2 . $x['value']; ?>" alt="<?php echo $x2 . $x['value']; ?>">
            </div>
        <?php endif; ?>
        <div class="descriptImg">
            <?php echo $x['value']; ?>
        </div>
    </div>
</div>