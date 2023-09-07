<?php
function html_escape(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
}

function pdo(PDO $pdo, string $sql, array $arguments = null)
{
    if (!$arguments){
        return $pdo->query($sql);
    }
    $statement = $pdo->prepare($sql);
    $statement->execute($arguments);
    return $statement;
}

?>
