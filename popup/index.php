<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('.popup').classList.add('open');
            document.querySelector('.popup__title').innerHTML = 'Стас пидр';
        });
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>