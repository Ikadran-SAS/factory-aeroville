<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau message — Factory &amp; Co Aéroville</title>
</head>
<body style="font-family: Arial, sans-serif; background:#fafafa; padding:24px; color:#333;">
    <div style="max-width:600px; margin:0 auto; background:#fff; border-radius:8px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <h1 style="color:#1B263A; border-bottom:3px solid #F5C3DB; padding-bottom:12px; margin-top:0;">
            Nouveau message — Factory &amp; Co Aéroville
        </h1>

        <table style="width:100%; border-collapse:collapse; margin-top:20px;">
            <tr>
                <td style="padding:12px; border-bottom:1px solid #eee; font-weight:700; width:140px; color:#666;">Nom</td>
                <td style="padding:12px; border-bottom:1px solid #eee;">{{ $data['prenom'] }} {{ $data['nom'] }}</td>
            </tr>
            <tr>
                <td style="padding:12px; border-bottom:1px solid #eee; font-weight:700; color:#666;">E-mail</td>
                <td style="padding:12px; border-bottom:1px solid #eee;">
                    <a href="mailto:{{ $data['email'] }}" style="color:#CC3366; text-decoration:none;">{{ $data['email'] }}</a>
                </td>
            </tr>
            <tr>
                <td style="padding:12px; border-bottom:1px solid #eee; font-weight:700; color:#666;">Sujet</td>
                <td style="padding:12px; border-bottom:1px solid #eee;">{{ $data['sujet'] }}</td>
            </tr>
        </table>

        <div style="margin-top:24px;">
            <h3 style="color:#1B263A; margin-bottom:8px;">Message</h3>
            <div style="background:#fafafa; padding:20px; border-left:4px solid #F5C3DB; border-radius:4px; white-space:pre-wrap;">{{ $data['message'] }}</div>
        </div>

        <p style="margin-top:32px; font-size:12px; color:#999; text-align:center;">
            Message envoyé depuis le formulaire de contact du site <strong>aeroville.factoryandco.com</strong>
        </p>
    </div>
</body>
</html>
