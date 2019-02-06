<h1>Blog Categories</h1>
<table>
    <thead>
        <tr>
            <th>カテゴリーID</th>
            <th>カテゴリー</th>
            <th>タイトル</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Category as $category): ?>
        <tr>
            <td><?php echo $category['Category']['id']; ?></td>
            <td><?php echo $category['Category']['category']; ?></td>
            <td>
            <?php foreach ($category['Posts'] as $post): ?>
                <?php echo $post['title']; ?><br>
            <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
