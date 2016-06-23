<?php

function engelsystem_email_to_user($recipient_user, $title, $message, $not_if_its_me = false) {
  global $user;

  if ($not_if_its_me && $user['UID'] == $recipient_user['UID'])
    return true;

  gettext_locale($recipient_user['Sprache']);

  $message = sprintf(_("Hi %s,"), $recipient_user['Nick']) . "\n\n" . _("here is a message for you from the engelsystem:") . "\n\n" . $message . "\n\n" . _("This email is autogenerated and has not to be signed. You got this email because you are registered in the engelsystem.");

  gettext_locale();
  return engelsystem_email($recipient_user['email'], $title, $message);
}

function engelsystem_email($address, $title, $message)
{
    //return mail($address, $title, $message, "Content-Type: text/plain; charset=UTF-8\r\nFrom: Engelsystem <noreply@engelsystem.de>");
    // guly 20160619
    return mail(
        $address,
        $title,
        $message,
        "Content-Type: text/plain; charset=UTF-8\r\nFrom: ESC Volunteers <takeashift@endsummercamp.org>",
        "-f takeashift@endsummercamp.org");
}
