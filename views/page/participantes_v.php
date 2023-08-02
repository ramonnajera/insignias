<div class="container mx-auto mt-5">
    <section>
        <p class="mb-2 mt-0 text-5xl font-medium leading-tight">Participantes</p>
        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!$participantes):?>
            <tr>
            <td>No hay participantes</td>
            </tr>
            <?php else:?>
            <?php foreach($participantes as $participante):?>
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
            <td class="py-4 px-6 border-b border-gray-200"><?=$participante["participante_id"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$participante["usuario_nombre"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$participante["usuario_correo"]?></td>
            <td class="py-4 px-6 border-b border-gray-200">
                <a href="<?=htmlspecialchars(base_url."Participante/update?id=".$participante["participante_id"]."&cid=".$_GET['id']."&status=".+$participante["participante_terminado"])?>" class="btn btn-<?=$participante["participante_terminado"] =="f"?'primary':'secundary'?>"><?=$participante["participante_terminado"] =="f" ?' <i class="fa-solid fa-certificate"></i>' : '<i class="fa-solid fa-certificate"></i>'?></a>
            </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
        </tbody>
        </table>
    </section>
</div>