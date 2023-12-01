<?php $this->layout("Master"); ?>

<div class="container">
    <h2>Listar Tipos de Contato</h2>

    <form class="form-inline">
        <div class="row">
            <div class="col">
                <label for="email">Nome</label>
                <input class="form-control" type="text" id="email" name="email">
            </div>
            <div class="col">
                <label for="name">Data de criação</label>
                <input class="form-control" id="name" type="text" name="name">
            </div>
            <div class="col">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <div class="col mt-4">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de criação</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <?php if (empty($data)) { ?>

            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Nenhum tipo de contato encontrado encontrado!</td>
                </tr>
            </tbody>

        <?php }  ?>

        <?php if (!empty($data)) { ?>

            <tbody>
                <?php foreach ($data['data'] as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $value['type_contact_id'] ?></th>
                        <td><?= $value['name'] ?></td>
                        <td><?= date("d/m/Y", strtotime($value['created_at'])) ?></td>
                        <td><?= $value['status'] == 1 ? "Ativo" : "Inativo" ?></td>

                        <?php if ($value['status'] == 1) { ?>

                            <td>
                                <a href="/type-contact-update/?id=<?= $value['type_contact_id'] ?>" target="_blank">Alterar</a>
                                <a href="/type-contact-delete/?id=<?= $value['type_contact_id'] ?>" target="_blank">Inativar</a>
                            </td>

                        <?php } ?>

                        <?php if ($value['status'] == 0) { ?>
                            <td>
                                <a href="/type-contact-actived/?id=<?= $value['type_contact_id'] ?>">Ativar</a>
                            </td>
                        <?php } ?>
                    </tr>

                <?php } ?>

            </tbody>

        <?php } ?>

    </table>

</div>