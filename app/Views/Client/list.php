<?php $this->layout("Master"); ?>

<div class="container">
    <h2>Listar Clientes</h2>

    <form class="form-inline">
        <div class="row">
            <div class="col">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email">
            </div>
            <div class="col">
                <label for="name">Nome</label>
                <input class="form-control" id="name" type="text" name="name">
            </div>
            <div class="col">
                <label for="created_at">Data de cadastro</label>
                <input class="form-control" id="created_at" type="date" name="created_at">
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
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Documento</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <?php if (empty($data)) { ?>

            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Nenhum cliente encontrado!</td>
                </tr>
            </tbody>

        <?php }  ?>

        <?php if (!empty($data)) { ?>

            <tbody>
                <?php foreach ($data['data'] as $key => $value) { ?>

                    <tr>
                        <th scope="row"><?= $value['client_id'] ?></th>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['lastname'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['type_person_id'] == 1 ? 'Fisica' : 'Juridica' ?></td>
                        <td><?= $value['type_person_id'] == 1 ? $value['cpf'] : $value['cnpj'] ?></td>
                        <td><?= $value['status'] == 1 ? "Ativo" : "Inativo" ?></td>

                        <?php if ($value['status'] == 1) { ?>

                            <td>
                                <a href="/client-update/?id=<?= $value['client_id'] ?>" target="_blank">Alterar</a>
                                <a href="/client-delete/?id=<?= $value['client_id'] ?>" target="_blank">Inativar</a>
                            </td>

                        <?php } ?>

                        <?php if ($value['status'] == 0) { ?>
                            <td>
                                <a href="/client-actived/?id=<?= $value['client_id'] ?>">Ativar</a>
                            </td>
                        <?php } ?>
                    </tr>

                <?php } ?>

            </tbody>

        <?php } ?>

    </table>

</div>