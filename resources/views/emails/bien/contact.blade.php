<x-mail::message>
# Nouvelle demande de contact pour un bien

Bonjour, vous avez reçu une nouvelle demande de contact pour le bien <a href="{{ route('biens.show', ['bien' => $bien]) }}">{{ $bien->titre }}</a>.

## Message:
{{ $data['message'] }}

Les coordonées de la personne:
- Prénom: {{ $data['prenom'] }}
- Nom: {{ $data['nom'] }}
- N° de téléphone: {{ $data['phone'] }}
- Email: {{ $data['email'] }}
</x-mail::message>
