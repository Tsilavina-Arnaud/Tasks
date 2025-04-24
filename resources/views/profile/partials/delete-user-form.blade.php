<section class="space-y-6">
    <div class="px-4">
        <header>
            <h2 class="text-md">
                Supprimer mon compte
            </h2>

            <p class="mt-1 text-muted">
                Une fois que votre compte est supprimé, vous n'aurez plus accès à toutes vos tâches. Donc exportez vos
                données avant de faire cette action!
            </p>
        </header>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
            Supprimer
        </button>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-info">Suppression du compte</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <x-modal></x-modal>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
