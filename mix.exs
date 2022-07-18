defmodule Yestoday.MixProject do
  use Mix.Project

  @github_url "https://github.com/SanGeeky/YESTODAY"
  @version "0.1.0"

  def project do
    [
      app: :yestoday,
      version: @version,
      elixir: "~> 1.13",
      start_permanent: Mix.env() == :prod,
      description: description(),
      source_url: @github_url,
      package: package(),
      deps: deps()
    ]
  end

  def application do
    []
  end

  defp deps do
    []
  end

  defp description do
    "Simple API with random phrases of the song YESTODAY from NCT U."
  end

  defp package do
    [
      description: description(),
      files: ["lib", "mix.exs", "README*", "LICENSE"],
      licenses: ["MIT"],
      links: %{
        "GitHub" => @github_url
      }
    ]
  end
end
