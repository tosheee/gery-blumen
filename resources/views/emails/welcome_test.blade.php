<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body style="background: #eef1f3; padding: 40px 0;font-size: 16px; line-height: 28px;">


<div style="text-decoration: none; color: #168eea;"  id="email-wrap" >
    <table id="email" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
        <thead>
        <tr>
            <th width="20%" style="background-color: #e4838b; padding: 30px;">
                <img  style="display: block;" src="http://bags.streamlinedigit.com/storage/common_pictures/logo.png" alt="" height="32" class="header-logo"/>
            </th>
            <th style="background-color: #e4838b; padding: 30px;">Онлайн магазин за чанти</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="2" style="padding: 25px 40px;">
                <h3>Добре дошли, {{ $user['name'] }}!</h3>
                <p>Благодарим Ви, че се регистрирахте в нашия сайт: <strong>{{ $user['email'] }}</strong></p>
                <p>Няшия екип искрено се надява да намерите това което търсите при нас.</p>
                <p>
                    <a href="http://bags.streamlinedigit.com/" class="button button-blue" target="_blank" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3097D1; border-top: 10px solid #3097D1; border-right: 18px solid #3097D1; border-bottom: 10px solid #3097D1; border-left: 18px solid #3097D1;">
                        Обратно в магазина
                    </a>
                    <strong></strong>
                </p>
                <p>Благодарим ви, че избрахте нас.<br /></p>
                <hr />
                <p>
                    Ако имате въпроси, можете да кликнете тук, за да се свържете с нашия екип за поддръжка.
                    <a href="mailto:support@sermonary.co" target="_new">Кликнете ТУК.</a>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>