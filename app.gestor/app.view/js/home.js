function startBoxToggle()
{
	//Esconde todos os box
	$(".usuarioShow").hide();
	$(".socialShow").hide();
	$(".phpMyAdminShow").hide();
	$(".logoutShow").hide();
	$(".webShow").hide();
	$(".tecnicoShow").hide();
	$(".javaShow").hide();
	$(".portifolioShow").hide();
	$(".curriculumShow").hide();
	$(".escolaridadeShow").hide();
	$(".cursosShow").hide();
	$(".experienciaShow").hide();
	
	//Usuario
	$(".usuarioBox").hover(function()
	{
		$(".usuarioShow").toggle(150);
	});
	
	//Redes Sociais
	$(".socialBox").hover(function()
	{
		$(".socialShow").toggle(150);
	});
	
	//PHP My Admin
	$(".phpMyAdminBox").hover(function()
	{
		$(".phpMyAdminShow").toggle(150);
	});
	
	//Logout
	$(".logoutBox").hover(function()
	{
		$(".logoutShow").toggle(150);
	});
	  
	//WebDesigner
	$(".webBox").hover(function()
	{
		$(".webShow").toggle(150);
	});
	
	//Técnico de Informática
	$(".tecnicoBox").hover(function()
	{
		$(".tecnicoShow").toggle(150);
	});
	
	//Java
	$(".javaBox").hover(function()
	{
		$(".javaShow").toggle(150);
	});
	
	//Portifólio
	$(".portifolioBox").hover(function()
	{
		$(".portifolioShow").toggle(150);
	});
	
	//Curriculum
	$(".curriculumBox").hover(function()
	{
		$(".curriculumShow").toggle(150);
	});
	
	//Escolaridade
	$(".escolaridadeBox").hover(function()
	{
		$(".escolaridadeShow").toggle(150);
	});
	
	//Cursos
	$(".cursosBox").hover(function()
	{
		$(".cursosShow").toggle(150);
	});
	
	//Experiencia
	$(".experienciaBox").hover(function()
	{
		$(".experienciaShow").toggle(150);
	});
};