SELECT invoices.id, invoices.name, invoices.partner_id, invoices.user_id, partners.name AS partners_name
FROM invoices
RIGHT JOIN partners ON invoices.partner_id = partners.id
WHERE invoices.user_id = 1

