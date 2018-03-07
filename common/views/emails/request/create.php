<?php
  use yii\helpers\Url;

  $baseUrl=Url::home(true);
  $imgSrcUrl=$baseUrl.'/images/email/';
?>
<tr>
  <td height="40"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
</tr>
<tr>
  <td style="background-color: #ffffff;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="<!-- background-color:#fff -->; ">
      <tr>

        <td width="34"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
        <td>
          <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
              <td height="67"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
            </tr>

            <tr>
              <td style="text-align: center;color:#484854; font-family: 'Lato', sans-serif;font-size:30px; font-weight: 300;">
                Новый заказ на парсинг сайта
              </td>
            </tr>

            <tr>
              <td height="40"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
            </tr>

            <tr>
              <td style="text-align: left;color:#767781; font-family: 'Lato', sans-serif;font-size:20px; font-weight: 300; word-spacing: 1px;">
                <p>Источник: <?= $model->websites; ?></p>
              </td>
            </tr>
            <tr>
              <td height="10"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
            </tr>
            <tr>
              <td style="text-align: left;color:#767781; font-family: 'Lato', sans-serif;font-size:20px; font-weight: 300; word-spacing: 1px;">
                <p>Контакт: <?= $model->first_name.' '.$model->last_name.' '.$model->email; ?></p>
              </td>
            </tr>
            <tr>
              <td height="10"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
            </tr>
            <tr>
              <td style="text-align: left;color:#767781; font-family: 'Lato', sans-serif;font-size:20px; font-weight: 300; word-spacing: 1px;">
                <p>Заказ: <a href="<?= $baseUrl.$model->viewUrl; ?>"><?= $model->slug; ?></a></p>
              </td>
            </tr>
            <tr>
              <td height="20"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
            </tr>
          </table>
        </td>
        <td width="34"><img src="<?= $imgSrcUrl; ?>blank.gif" alt="" width="1" height="1" /></td>
      </tr>
    </table>
  </td>
</tr>