<!DOCTYPE html>
<html>
<head>
  <title>Interfaz Gráfica</title>
  <style>
    /* Estilos CSS para la interfaz */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    
    header {
      background-color: #0077b6;
      color: white;
      padding: 20px;
      display: flex;
      justify-content: space-around;
    }
    
    header button {
      background-color: #0077b6;
      color: white;
      border: 2px solid white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    
    header button:hover {
      background-color: #005b8f;
    }
    
    main {
      padding: 20px;
      background-color: white;
    }
  </style>
</head>
<body>
  <header>
    <button>Solicitudes</button>
    <button>Inventarios</button>
    <button>Gestión de Cápsulas</button>
  </header>
  
  <main>
    <!-- Aquí se mostraría el contenido relevante -->
    <h1>Bienvenido a la interfaz gráfica</h1>
    <p>Aquí podrás gestionar tus solicitudes, inventarios y cápsulas.</p>
  </main>
</body>
</html>