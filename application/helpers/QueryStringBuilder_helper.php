<?php
function qsb_buildFieldsList(array $fieldsArr)
{
	return sizeof($fieldsArr) > 0 ? sprintf('`%s`', implode('`, `', $fieldsArr)) : '*';
}

function qsb_buildKeyStringForInsertQuery(array $keyValuePairs)
{
	return sprintf('(`%s`)', implode('`, `', array_keys($keyValuePairs)));
}

function qsb_buildValueStringForInsertQuery(array $keyValuePairs)
{
	return sprintf('(%s)', join(', ', array_map(function ($value) {
		return $value == null ? 'NULL' : "'$value'";
	}, $keyValuePairs)));
}
