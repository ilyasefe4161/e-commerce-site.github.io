<style>
    /* CSS stilleri burada yer alabilir */
    body {
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
    }

    .faq-item {
        margin-bottom: 20px;
    }

    .question {
        font-weight: bold;
        cursor: pointer;
    }

    .answer {
        margin-top: 10px;
        display: none;
    }

    .answer p {
        margin: 0;
    }
</style>
<script>
    // JavaScript kodu burada yer alabilir
    function toggleAnswer(element) {
        var answer = element.nextElementSibling;
        if (answer.style.display === "none") {
            answer.style.display = "block";
        } else {
            answer.style.display = "none";
        }
    }
</script>

<table width="1120" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr height="50" bgcolor="orange">
        <td align="left">
            <h2>&nbsp;FREQUANTLY ASKED QUESTIONS</h2>
        </td>
    </tr>
    <tr height="50">
        <td align="left" style="border-bottom: 1px dashed #ccc">&nbsp;If you want to learn something or you have a
            problem you can looka at this page. However if you have some other question from this page, please fill
            out the contact us form in the Contact us page.</td>
    </tr>

    <tr>
        <td>
            <?php
            require_once("Settings/setting.php");
            $QuestionQuery = $DatabaseConnection->prepare("SELECT * FROM questions");
            $QuestionQuery->execute();
            $QuestionNumber = $QuestionQuery->rowCount();
            $Questions = $QuestionQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($Questions as $Question) {
                ?>
                <div class="container">
                    <div class="faq-item">
                        <div id="<?php echo $Question["id"]; ?>" class="question" onclick="toggleAnswer(this)"><?php echo $Question["question"]; ?></div>
                        <div class="answer">
                            <p>
                                <?php echo $Question["answer"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </td>
    </tr>
</table>