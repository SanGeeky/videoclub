defmodule YestodayTest do
  use ExUnit.Case
  doctest Yestoday

  test "sent a random yestoday phrase" do
    assert Yestoday.for_u() =~ ~r/This is for u...\n«|»/
  end
end
