@extends('app')

@section('content')
    <h1>Liste des tâches</h1>

    <!-- Formulaire Ajouter une tâche -->
    <form action="{{ route('taches.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" required placeholder="Nom de la tâche">
        </div>
        <div class="form-group">
            <label for="action">Action</label>
            <input type="text" class="form-control" name="action" id="action" required placeholder="Action de la tâche">
        </div>
        <button type="submit" class="btn btn-success mt-3">Ajouter une tâche</button>
    </form>

    <!-- Table des tâches -->
    <table class="table mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Action</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($taches as $tache)
                <tr>
                    <td>{{ $tache->id }}</td>
                    <td>{{ $tache->nom }}</td>
                    <td>{{ $tache->action }}</td>
                    <td>
                        <!-- Bouton Modifier -->
                        <a href="{{ route('taches.edit', $tache->id) }}" class="btn btn-primary">Modifier</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('taches.destroy', $tache->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection