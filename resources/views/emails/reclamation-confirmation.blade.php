@component('mail::message')
# ✅ Confirmation de votre réclamation

Bonjour {{ $civilite }} {{ $nom }},

Nous avons bien reçu votre réclamation concernant **{{ $objet }}**.

## Informations de votre dossier

- **Numéro de dossier** : #{{ $numero }}
- **Date de réception** : {{ now()->locale('fr')->format('j F Y à H:i') }}
- **Objet** : {{ $objet }}

## Prochaines étapes

Notre équipe examinera votre réclamation dans les meilleurs délais. Vous recevrez une réponse à l'adresse email utilisée pour cette demande.

**Référez-vous à votre numéro de dossier (#{{ $numero }}) lorsque vous vous adressez à nous concernant cette réclamation.**

---

@component('mail::button', ['url' => config('app.url') . '/dashboard'])
Consulter votre tableau de bord
@endcomponent

Merci de votre confiance.

Cordialement,

**L'équipe du Congrès SOCEDIAMN 2026**

---

*Cet email a été généré automatiquement. Veuillez ne pas répondre directement à ce message. Utilisez le formulaire de contact sur notre plateforme pour toute question.*
@endcomponent
